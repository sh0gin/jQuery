  <?php
    // пункт 6, пункт isAdmin, метод в mysql возвращает select, убрать страничка(2 шт)
    class User
    {
        public $__db_title;
        public $token;
        public $__user_ban = false;
        public $id;

        public $name;
        public $surname;
        public $patronymic;
        public $login;
        public $email;
        public $password;
        public $password_repeat;

        public $valid_name = false;
        public $valid_surname = false;
        public $valid_patronymic = false;
        public $valid_login = false;
        public $valid_email = false;
        public $valid_password = false;
        public $valid_password_repeat = false;

        public $admin_login;
        public $admin_password;

        public $isGuest = true;
        public $isAdmin = false;

        public $request;
        public $mysql;

        public function __construct($request, $mysql)
        {
            $this->request = $request;
            $this->mysql = $mysql;

            if ($this->request->get("token")) {

                $this->identity();
            }
        }

        public function load($array = null): bool
        {

            if (Asists::load($this, $array)) {

                if ($this->isAdmin()) {
                    $this->isAdmin = true;
                }
                $mas = $this->mysql->select("SELECT date_end from BLOCK where user_id = '{$this->id}' ORDER BY date_start DESC LIMIT 1");
                if ($mas) {
                    if ($mas[0]['date_end'] != null){
                        $end_block = new Datetime ($mas[0]['date_end']);
                    } else {
                        $this->__user_ban = "никогда";
                    }
                }
                if (isset($end_block)) {
                    $current_time = new Datetime();
                    $current_time = $current_time->format("U");
                    $end = $end_block -> format("U");
                    if ($end - $current_time > 0) {
                        $this->__user_ban = Asists::format_date($end_block);
                    }
                }
                return true;
            }
            return false;
        }

        public function validateRegister(): bool
        {
            $result = false;
            $result = Asists::validateDate($this);

            if ($this->mysql->repeat_check("user", "login", $this->login)) {
                $this->valid_login = "Такой логин уже занят!:) Придумай новый!";
                $result = true;
            }
            if ($this->mysql->repeat_check("user", "email", $this->email)) {
                $this->valid_email = "Такой email уже занят!:)";
                $result = true;
            }
            if ($this->password != $this->password_repeat) {
                $this->valid_password_repeat = "Пароли не совпадают";
                $result = true;
            }
            if (in_array($this->password, ["password", "123456", "admin"])) {
                $this->valid_password = "Очень известный пароль! Его могут легко взломать! Используйте другой пароль!";
                $result = true;
            }
            return $result;
        }

        public function save(): bool
        {
            $password = password_hash($this->password, PASSWORD_BCRYPT);
            return (bool) ($this->mysql->query("INSERT into user (login, surname, patronymic, name, email, password)
        VALUES ('$this->login', '$this->surname', '$this->patronymic', '$this->name', '$this->email', '$password')"));
        }

        public function validateLogin(): bool
        {
            $result = false;
            // $result = Asists::validateDate($this);
            if (is_null($this->request->parameter_cleaning($this->login)) || $this->request->parameter_cleaning($this->login)=== "") {
                $this->valid_login = "Пустое значение";
                $result = true;
            }
            if (is_null($this->request->parameter_cleaning($this->password))|| $this->request->parameter_cleaning($this->login)=== "") {
                $this->valid_password = "Пустое значение";
                $result = true;
            }

            return $result;
        }

        public function login(): bool
        {
            $mas = $this->mysql->select("select * from user where login = '{$this->login}'");
            if ($mas) {
                $mas = $this->mysql->select("select * from user where login = '{$this->login}'");
                $mas = $mas[0];
                if (password_verify($this->password, $mas["password"])) {
                    $this->load($mas);

                    if ($this->__user_ban) {
                        $this->valid_login = "Данный пользователь заблокирован. Дата разблокировки: {$this->__user_ban}";
                        return false;
                    }
                    $this->id = $mas["id"];
                    $this->token = md5($this->id . time());
                    $this->mysql->query("UPDATE user SET token = '{$this->token}' WHERE login = '{$this->login}'");
                    $this->isGuest = false;

                    return true;
                } else {
                    $this->valid_password = "Неверный пароль";
                    return false;
                }
            }
            $this->valid_login = "Пользователя с таким логином нет!";
            return false;
        }

        public function identity(?int $id = null): ?object
        {

            $res = null;
            if ($id) {
                $mas = $this->mysql->select("select * from user where id = '$id'");
                if ($mas && $this->load($mas[0])) {
                    $res = $this;
                }
            } else {
                $mas = $this->mysql->select("select * from user where token = '{$this->request->get('token')}'");
                if ($mas && $this->load($mas[0])) {
                    $this->isGuest = false;
                    $res = $this;
                }
            }

            return $res;
        }

        public function isAdmin(): bool
        {
            $mas = $this->mysql->select("select * from user where login = '{$this->login}' AND role = 1");

            if ($mas) {
                return true;
            }
            return false;
        }

        public function logout(): bool
        {
            if (!$this->isGuest) {
                $this->mysql->query("UPDATE user SET token = NULL WHERE login = '{$this->login}'");
            }
            return true;
        }

        public function get_user()
        {
            $result = [];
            foreach($this->mysql->select("SELECT * FROM USER") as $value)
            {
                $exam_user = new static($this->request, $this->mysql);
                $exam_user->identity($value["id"]);

                $result[] = $exam_user;
            }
            return $result;
        }
    }

// INSERT into user (login, surname, patronymic, name, email, password)
// VALUES ("LOGIN", "surname", "patronymic", "name", "email", "passwd")

// $pum = ($this->mysql->query("SELECT * FROM USER"));
// $row = mysqli_fetch_assoc($pum);
// var_dump( $row );

        // foreach ($mas as $key => $value) {

        //     if (!array_filter(["__", "valid", "is", "ex", "admin"], fn($elem) => str_contains($key, $elem))) {
        //         if (!$this->request->parameter_cleaning($value)) {
        //             $at = "valid_$key";
        //             $this->$at = "Пустое значение";
        //             $result = true;
        //         }
        //     }
        // }