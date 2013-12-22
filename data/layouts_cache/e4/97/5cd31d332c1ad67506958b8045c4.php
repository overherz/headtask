<?php

/* applications\users\layouts\edit.html */
class __TwigTemplate_e4975cd31d332c1ad67506958b8045c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_css($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("<link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "users.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"/source/js/miniColors/jquery.miniColors.css\">
");
    }

    // line 6
    public function block_js($context, array $blocks = array())
    {
        // line 7
        echo \layout::func_from_text("<script type=\"text/javascript\" src=\"/source/js/miniColors/jquery.miniColors.min.js\"></script>
<script type=\"text/javascript\" src=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "edit.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 11
    public function block_context($context, array $blocks = array())
    {
        // line 12
        $this->env->loadTemplate("/source/crumbs.html")->display($context);
        // line 13
        echo \layout::func_from_text("<div class=\"content\">
    <form class=\"form-horizontal span6\" id=\"edit_profile\" method=\"POST\">
        <input type=\"hidden\" name=\"act\" value=\"save_profile\">
        <input type=\"hidden\" name=\"id\" value=\"");
        // line 16
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("\">
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"fio\">ФИО</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"fio\" id=\"fio\" value=\"");
        // line 20
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("\" class=\"span12\" />
             </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"nickname\">Ник</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"nickname\" id=\"nickname\" value=\"");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("\" class=\"span12\" />
            </div>
        </div>
        <div class=\"control-group\">
            <label class=\"control-label\" for=\"birthday\">Дата Рождения:</label>
            <div class=\"controls\">
                <input type=\"text\" name=\"birthday\" id=\"birthday\" value=\"");
        // line 32
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday"), "html", null, true));
        echo \layout::func_from_text("\" readonly />
            </div>
        </div>
        ");
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 36
            echo \layout::func_from_text("        <div class=\"control-group\">
            <label class=\"control-label\" for=\"");
            // line 37
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "alias"), "html", null, true));
            echo \layout::func_from_text(":</label>
            <div class=\"controls\">
                ");
            // line 39
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "type") == "text")) {
                // line 40
                echo \layout::func_from_text("                    <input type=\"text\" name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                echo \layout::func_from_text("\" class=\"span12\" />
                ");
            } elseif (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "type") == "textarea")) {
                // line 42
                echo \layout::func_from_text("                    <textarea class=\"span12\" name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" rows=\"10\" id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                echo \layout::func_from_text("</textarea>
                ");
            }
            // line 44
            echo \layout::func_from_text("            </div>
        </div>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo \layout::func_from_text("        <div class=\"control-group\">
            <label class=\"control-label\" for=\"tz\">Часовой пояс:</label>
            <div class=\"controls\">
                <select id=\"tz\" name=\"tz\">
                    <option
                    ");
        // line 52
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-39600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 11] о. Мидуэй,
                    Самоа\" value=\"-39600\">[UTC − 11:00] о. Мидуэй, Самоа</option>
                    <option
                    ");
        // line 55
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-36000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 10] Гавайи\"
                    value=\"-36000\">[UTC − 10:00] Гавайи</option>
                    <option
                    ");
        // line 58
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-34200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 9:30] Маркизские
                    острова\" value=\"-34200\">[UTC − 09:30] Маркизские острова</option>
                    <option
                    ");
        // line 61
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-32400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 9] Аляска\"
                    value=\"-32400\">[UTC − 09:00] Аляска</option>
                    <option
                    ");
        // line 64
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-28800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 8]
                    Североамерик. тихоокеанское время (США и Канада) и Тихуана\" value=\"-28800\">[UTC − 08:00]
                    Североамерик. тихоокеанское время (США и Канада) и Тихуана</option>
                    <option
                    ");
        // line 68
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-25200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 7] Горное время
                    (США), Мексика (Чиуауа, Ла-Пас, Масатлан)\" value=\"-25200\">[UTC − 07:00] Горное время (США), Мексика
                    (Чиуауа, Ла-Пас, Масатлан)</option>
                    <option
                    ");
        // line 72
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-21600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 6] Мексика
                    (Гвадалахара, Мехико, Монтеррей), Центральная Америка, Центральное время (США и Канада)\"
                    value=\"-21600\">[UTC − 06:00] Мексика (Гвадалахара, Мехико, Монтеррей), Центральная Америка, Центральное
                    время (США и Канада)</option>
                    <option
                    ");
        // line 77
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-18000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 5]
                    Североамерик. восточное время (США и Канада), Южноамерик. тихоокеанское время (Богота, Лима,
                    Кито)\" value=\"-18000\">[UTC − 05:00] Североамерик. восточное время (США и Канада), Южноамерик. тихоокеанское время (Богота, Лима, Кито)</option>
                    <option
                    ");
        // line 81
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-16200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 4:30] Венесуэла\"
                    value=\"-16200\">[UTC − 04:30] Венесуэла</option>
                    <option
                    ");
        // line 84
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-14400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 4] Сантьяго,
                    Атлантическое время (Канада)\" value=\"-14400\">[UTC − 04:00] Сантьяго, Атлантическое время
                    (Канада)</option>
                    <option
                    ");
        // line 88
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-10800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 3] Бразилия,
                    Гренландия\" value=\"-10800\">[UTC − 03:00] Бразилия, Гренландия</option>
                    <option
                    ");
        // line 91
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-7200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 2]
                    Среднеатлантическое время\" value=\"-7200\">[UTC − 02:00] Среднеатлантическое время</option>
                    <option
                    ");
        // line 94
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-3600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 1] Азорские
                    острова, острова Зелёного мыса\" value=\"-3600\">[UTC − 01:00] Азорские острова, острова Зелёного
                    мыса</option>
                    <option
                    ");
        // line 98
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "0")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC = 0] Время по Гринвичу:
                    Дублин, Лондон, Лиссабон, Эдинбург\" value=\"0\">[UTC = 00:00] Время по Гринвичу: Дублин, Лондон, Лиссабон,
                    Эдинбург</option>
                    <option
                    ");
        // line 102
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "3600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 1] Берлин, Мадрид,
                    Париж, Рим, Западная Центральная Африка\" value=\"3600\">[UTC + 01:00] Берлин, Мадрид, Париж, Рим, Западная
                    Центральная Африка</option>
                    <option
                    ");
        // line 106
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "7200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 2] Афины, Вильнюс,
                    Киев, Минск, Рига, Таллин, Центральная Африка\" value=\"7200\">[UTC + 02:00] Афины, Вильнюс, Киев, Минск,
                    Рига, Таллин, Центральная Африка</option>
                    <option
                    ");
        // line 110
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "10800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 3] Калининград,Минск, Восточноафриканское время\" value=\"10800\">[UTC + 03:00]
                    Калининград, Минск, Восточноафриканское время</option>
                    <option
                    ");
        // line 113
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "14400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 4] Москва,
                     страны Закавказья, Объединённые Арабские Эмираты, Оман\" value=\"14400\">[UTC + 04:00] Москва, страны Закавказья, Объединённые Арабские Эмираты, Оман</option>
                    <option
                    ");
        // line 116
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "16200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 4:30] Кабул\"
                    value=\"16200\">[UTC + 04:30] Кабул</option>
                    <option
                    ");
        // line 119
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "18000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 5] Западный
                    Казахстан, Пакистан, Таджикистан, Туркмения, Узбекистан\" value=\"18000\">[UTC + 05:00] Западный Казахстан,
                    Пакистан, Таджикистан, Туркмения, Узбекистан</option>
                    <option
                    ");
        // line 123
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "19800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 5:30] Бомбей,
                    Калькутта, Мадрас, Нью-Дели\" value=\"19800\">[UTC + 05:30] Бомбей, Калькутта, Мадрас, Нью-Дели</option>
                    <option
                    ");
        // line 126
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "20700")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 5:45] Катманду\"
                    value=\"20700\">[UTC + 05:45] Катманду</option>
                    <option
                    ");
        // line 129
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "21600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 6]
                    Екатеринбург, центральная и восточная части Казахстана, Киргизия, Бангладеш, Бутанское время\"
                    value=\"21600\">[UTC + 06:00] Екатеринбург, центральная и восточная части Казахстана, Киргизия,
                    Бангладеш, Бутанское время</option>
                    <option
                    ");
        // line 134
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "23400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 6:30] Рангун\"
                    value=\"23400\">[UTC + 06:30] Рангун</option>
                    <option
                    ");
        // line 137
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "25200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 7] Омск,
                    Новосибирск, Кемерово, Юго-Восточная Азия (Бангкок, Джакарта, Ханой)\" value=\"25200\">[UTC + 07:00] Омск, Новосибирск, Кемерово, Юго-Восточная Азия (Бангкок, Джакарта, Ханой)</option>
                    <option
                    ");
        // line 140
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "28800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 8] Красноярс, Улан-Батор, Куала-Лумпур, Гонконг, Китай, Сингапур, Тайвань, западноавстралийское время\"
                    value=\"28800\">[UTC + 08:00] Красноярск, Улан-Батор, Куала-Лумпур, Гонконг, Китай, Сингапур,
                    Тайвань, западноавстралийское время</option>
                    <option
                    ");
        // line 144
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "31500")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 8:45]
                    Юго-восточная Западная Австралия\" value=\"31500\">[UTC + 08:45] Юго-восточная Западная Австралия</option>
                    <option
                    ");
        // line 147
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "32400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 9] Иркутское
                    время, Корея, Япония\" value=\"32400\">[UTC + 09:00] Иркутское время, Корея, Япония</option>
                    <option
                    ");
        // line 150
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "34200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 9:30]
                    Центральноавстралийское время\" value=\"34200\">[UTC + 09:30] Центральноавстралийское время</option>
                    <option
                    ");
        // line 153
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "36000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 10] Якутск, Восточноавстралийское время (Брисбен, Канберра, Мельбурн, Сидней),
                    Западно-тихоокеанское время\" value=\"36000\">[UTC + 10:00] Якутск, Восточноавстралийское время
                    (Брисбен, Канберра, Мельбурн, Сидней), Западно-тихоокеанское время</option>
                    <option
                    ");
        // line 157
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "37800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 10:30] Лорд-Хау\"
                    value=\"37800\">[UTC + 10:30] Лорд-Хау</option>
                    <option
                    ");
        // line 160
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "39600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 11]
                    Владивостокское время, Центрально-тихоокеанское время (Соломоновы Острова, Новая Каледония)\"
                    value=\"39600\">[UTC + 11:00] Владивостокское время, Центрально-тихоокеанское время (Соломоновы Острова,
                    Новая Каледония)</option>
                    <option
                    ");
        // line 165
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "41400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 11:30] Остров
                    Норфолк\" value=\"41400\">[UTC + 11:30] Остров Норфолк</option>
                    <option
                    ");
        // line 168
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "43200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 12] Магаданское
                    время, Маршалловы Острова, Фиджи, Новая Зеландия\" value=\"43200\">[UTC + 12:00] Магаданское время,
                    Маршалловы Острова, Фиджи, Новая Зеландия</option>
                    <option
                    ");
        // line 172
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "46800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 13] Острова
                    Феникс, Тонга\" value=\"46800\">[UTC + 13:00] Острова Феникс, Тонга</option>
                    <option
                    ");
        // line 175
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "50400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 14] Остров Лайн\"
                    value=\"50400\">[UTC + 14:00] Остров Лайн</option>
                </select>
                <div style=\"white-space: nowrap;\">Часовой пояс на вашем компьютере: <span id=\"localTZ\"></span></div>
                <a href=\"\" class=\"btn btn-primary\" id=\"save_profile\">Сохранить профиль</a>
            </div>
        </div>
    </form>
    ");
        // line 183
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "new"))) {
            // line 184
            echo \layout::func_from_text("
    <div class=\"span6\">
        <form id=\"change_pwd\" enctype=\"multipart/form-data\" method=\"POST\" action=\"/users/\" class=\"form-horizontal\">
            <input type=\"hidden\" name=\"act\" value=\"change_pwd\">
            <input type=\"hidden\" name=\"id\" value=\"");
            // line 188
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">
            <div class=\"control-group\">
                <label class=\"control-label\">Смена пароля:</label>
                <div class=\"controls\">
                    <div style=\"margin-bottom: 5px;\"><input type=\"password\" name=\"oldpwd\" value=\"\" placeholder=\"Текущий пароль\" /></div>
                    <div style=\"margin-bottom: 5px;\"><input type=\"password\" name=\"newpwd\" value=\"\" placeholder=\"Новый пароль\" /></div>
                    <div><input type=\"password\" name=\"rptpwd\" value=\"\" placeholder=\"Повтор пароля\" /></div>
                    <a class=\"btn btn-primary\" href=\"\" change_pwd style=\"margin-top: 10px;\">Сменить пароль</a>
                </div>
            </div>
        </form>

        <form ");
            // line 200
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail")) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text(" id=\"change_mail\" enctype=\"multipart/form-data\" method=\"POST\" action=\"/users/\" class=\"form-horizontal\">
            <input type=\"hidden\" name=\"act\" value=\"change_mail\">
            <input type=\"hidden\" name=\"id\" value=\"");
            // line 202
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">
            <div class=\"control-group\">
                <label class=\"control-label\">Смена адреса электронной почты:</label>
                <div class=\"controls\">
                    <div style=\"margin-bottom: 5px;\"><input type=\"text\" readonly=\"readonly\" style=\"color:gray;\" name=\"oldmail\" value=\"");
            // line 206
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "email"), "html", null, true));
            echo \layout::func_from_text("\" placeholder=\"Текущий e-mail\" /></div>
                    <div><input type=\"text\" name=\"newmail\" value=\"\" placeholder=\"Новый email\" rel=\"popover\" data-content=\"Вам необходимо иметь
                        доступ к обоим почтовым ящикам, на них будет выслано два уникальных кода подтверждения операции\" /></div>
                    <a class=\"btn btn-primary\" href=\"\" change_mail style=\"margin-top: 10px;\">Сменить адрес</a>
                </div>
            </div>
        </form>

            <div id=\"notchange_mail\" ");
            // line 214
            if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail"))) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text(">
            <div class=\"edpr-feild-name\" style=\"text-align: justify;padding-right: 40px;\">
                На данный момент вы находитесь в процессе смены адреса электронной почты. Вам необходимо подтвердить
                <span id=\"emails\">
                ");
            // line 218
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["k"] => $context["v"]) {
                // line 219
                echo \layout::func_from_text("                <span style=\"color:#FF5400;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "email"), "html", null, true));
                echo \layout::func_from_text("</span>");
                if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                    echo \layout::func_from_text(" и ");
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo \layout::func_from_text(".
                </span>

                Вы так же можете отменить процесс смены адреса электронной почты, нажав на кнопку ниже.
            </div>
            <a class=\"btn\" href=\"#\" cancel_chmail>Отменить смену e-mail</a>
            </div>
    </div>
    <div class=\"clearfix\"></div>
");
        }
        // line 229
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  560 => 229,  530 => 219,  513 => 218,  504 => 214,  493 => 206,  486 => 202,  479 => 200,  464 => 188,  458 => 184,  456 => 183,  443 => 175,  435 => 172,  426 => 168,  418 => 165,  408 => 160,  400 => 157,  391 => 153,  383 => 150,  375 => 147,  367 => 144,  358 => 140,  350 => 137,  342 => 134,  332 => 129,  324 => 126,  316 => 123,  307 => 119,  299 => 116,  291 => 113,  283 => 110,  274 => 106,  265 => 102,  256 => 98,  247 => 94,  239 => 91,  231 => 88,  222 => 84,  214 => 81,  205 => 77,  195 => 72,  186 => 68,  177 => 64,  169 => 61,  161 => 58,  153 => 55,  145 => 52,  138 => 47,  130 => 44,  120 => 42,  110 => 40,  108 => 39,  101 => 37,  98 => 36,  94 => 35,  88 => 32,  79 => 26,  70 => 20,  63 => 16,  58 => 13,  56 => 12,  53 => 11,  47 => 8,  44 => 7,  41 => 6,  33 => 3,  30 => 2,);
    }
}
