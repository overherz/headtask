<?php

/* applications\users\layouts\edit.html */
class __TwigTemplate_b8289e4673bfe5ec57a53ec2d0430dfee888c68364917138c269ccc820c0a633 extends Twig_Template
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
<div class=\"col-xs-8\">
    <div class=\"panel panel-default\">
    <div class=\"panel-heading\">Информация</div>
    <div class=\"panel-body\">
    <form class=\"form-horizontal\" id=\"edit_profile\" method=\"POST\">
        <input type=\"hidden\" name=\"act\" value=\"save_profile\">
        <input type=\"hidden\" name=\"id\" value=\"");
        // line 20
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("\">
        <div class=\"form-group\">
            <label class=\"col-lg-2 control-label\" for=\"fio\">ФИО</label>
            <div class=\"col-lg-10\">
                <input type=\"text\" name=\"fio\" id=\"fio\" value=\"");
        // line 24
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("\" class=\"form-control\" />
             </div>
        </div>
        <div class=\"form-group\">
            <label class=\"col-lg-2 control-label\" for=\"nickname\">Ник</label>
            <div class=\"col-lg-10\">
                <input type=\"text\" name=\"nickname\" id=\"nickname\" value=\"");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("\" class=\"form-control\" />
            </div>
        </div>
        <div class=\"form-group\">
            <label class=\"col-lg-2 control-label\" for=\"birthday\">Дата Рождения:</label>
            <div class=\"col-lg-10\">
                <input type=\"text\" name=\"birthday\" id=\"birthday\" value=\"");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday"), "html", null, true));
        echo \layout::func_from_text("\" readonly />
            </div>
        </div>
        ");
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 40
            echo \layout::func_from_text("        <div class=\"form-group\">
            <label class=\"col-lg-2 control-label\" for=\"");
            // line 41
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "alias"), "html", null, true));
            echo \layout::func_from_text(":</label>
            <div class=\"col-lg-10\">
                ");
            // line 43
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "type") == "text")) {
                // line 44
                echo \layout::func_from_text("                    <input type=\"text\" name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                echo \layout::func_from_text("\" class=\"form-control\" />
                ");
            } elseif (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "type") == "textarea")) {
                // line 46
                echo \layout::func_from_text("                    <textarea class=\"form-control\" name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\" rows=\"10\" id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                echo \layout::func_from_text("</textarea>
                ");
            }
            // line 48
            echo \layout::func_from_text("            </div>
        </div>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo \layout::func_from_text("        <div class=\"form-group\">
            <label class=\"col-lg-2 control-label\" for=\"tz\">Часовой пояс:</label>
            <div class=\"col-lg-10\">
                <select id=\"tz\" name=\"tz\" class=\"form-control\">
                    <option
                    ");
        // line 56
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-39600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 11] о. Мидуэй,
                    Самоа\" value=\"-39600\">[UTC − 11:00] о. Мидуэй, Самоа</option>
                    <option
                    ");
        // line 59
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-36000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 10] Гавайи\"
                    value=\"-36000\">[UTC − 10:00] Гавайи</option>
                    <option
                    ");
        // line 62
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-34200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 9:30] Маркизские
                    острова\" value=\"-34200\">[UTC − 09:30] Маркизские острова</option>
                    <option
                    ");
        // line 65
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-32400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 9] Аляска\"
                    value=\"-32400\">[UTC − 09:00] Аляска</option>
                    <option
                    ");
        // line 68
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-28800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 8]
                    Североамерик. тихоокеанское время (США и Канада) и Тихуана\" value=\"-28800\">[UTC − 08:00]
                    Североамерик. тихоокеанское время (США и Канада) и Тихуана</option>
                    <option
                    ");
        // line 72
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-25200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 7] Горное время
                    (США), Мексика (Чиуауа, Ла-Пас, Масатлан)\" value=\"-25200\">[UTC − 07:00] Горное время (США), Мексика
                    (Чиуауа, Ла-Пас, Масатлан)</option>
                    <option
                    ");
        // line 76
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-21600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 6] Мексика
                    (Гвадалахара, Мехико, Монтеррей), Центральная Америка, Центральное время (США и Канада)\"
                    value=\"-21600\">[UTC − 06:00] Мексика (Гвадалахара, Мехико, Монтеррей), Центральная Америка, Центральное
                    время (США и Канада)</option>
                    <option
                    ");
        // line 81
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-18000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 5]
                    Североамерик. восточное время (США и Канада), Южноамерик. тихоокеанское время (Богота, Лима,
                    Кито)\" value=\"-18000\">[UTC − 05:00] Североамерик. восточное время (США и Канада), Южноамерик. тихоокеанское время (Богота, Лима, Кито)</option>
                    <option
                    ");
        // line 85
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-16200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 4:30] Венесуэла\"
                    value=\"-16200\">[UTC − 04:30] Венесуэла</option>
                    <option
                    ");
        // line 88
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-14400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 4] Сантьяго,
                    Атлантическое время (Канада)\" value=\"-14400\">[UTC − 04:00] Сантьяго, Атлантическое время
                    (Канада)</option>
                    <option
                    ");
        // line 92
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-10800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 3] Бразилия,
                    Гренландия\" value=\"-10800\">[UTC − 03:00] Бразилия, Гренландия</option>
                    <option
                    ");
        // line 95
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-7200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 2]
                    Среднеатлантическое время\" value=\"-7200\">[UTC − 02:00] Среднеатлантическое время</option>
                    <option
                    ");
        // line 98
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "-3600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC − 1] Азорские
                    острова, острова Зелёного мыса\" value=\"-3600\">[UTC − 01:00] Азорские острова, острова Зелёного
                    мыса</option>
                    <option
                    ");
        // line 102
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "0")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC = 0] Время по Гринвичу:
                    Дублин, Лондон, Лиссабон, Эдинбург\" value=\"0\">[UTC = 00:00] Время по Гринвичу: Дублин, Лондон, Лиссабон,
                    Эдинбург</option>
                    <option
                    ");
        // line 106
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "3600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 1] Берлин, Мадрид,
                    Париж, Рим, Западная Центральная Африка\" value=\"3600\">[UTC + 01:00] Берлин, Мадрид, Париж, Рим, Западная
                    Центральная Африка</option>
                    <option
                    ");
        // line 110
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "7200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 2] Афины, Вильнюс,
                    Киев, Минск, Рига, Таллин, Центральная Африка\" value=\"7200\">[UTC + 02:00] Афины, Вильнюс, Киев, Минск,
                    Рига, Таллин, Центральная Африка</option>
                    <option
                    ");
        // line 114
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "10800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 3] Калининград,Минск, Восточноафриканское время\" value=\"10800\">[UTC + 03:00]
                    Калининград, Минск, Восточноафриканское время</option>
                    <option
                    ");
        // line 117
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "14400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 4] Москва,
                     страны Закавказья, Объединённые Арабские Эмираты, Оман\" value=\"14400\">[UTC + 04:00] Москва, страны Закавказья, Объединённые Арабские Эмираты, Оман</option>
                    <option
                    ");
        // line 120
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "16200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 4:30] Кабул\"
                    value=\"16200\">[UTC + 04:30] Кабул</option>
                    <option
                    ");
        // line 123
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "18000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 5] Западный
                    Казахстан, Пакистан, Таджикистан, Туркмения, Узбекистан\" value=\"18000\">[UTC + 05:00] Западный Казахстан,
                    Пакистан, Таджикистан, Туркмения, Узбекистан</option>
                    <option
                    ");
        // line 127
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "19800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 5:30] Бомбей,
                    Калькутта, Мадрас, Нью-Дели\" value=\"19800\">[UTC + 05:30] Бомбей, Калькутта, Мадрас, Нью-Дели</option>
                    <option
                    ");
        // line 130
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "20700")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 5:45] Катманду\"
                    value=\"20700\">[UTC + 05:45] Катманду</option>
                    <option
                    ");
        // line 133
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "21600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 6]
                    Екатеринбург, центральная и восточная части Казахстана, Киргизия, Бангладеш, Бутанское время\"
                    value=\"21600\">[UTC + 06:00] Екатеринбург, центральная и восточная части Казахстана, Киргизия,
                    Бангладеш, Бутанское время</option>
                    <option
                    ");
        // line 138
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "23400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 6:30] Рангун\"
                    value=\"23400\">[UTC + 06:30] Рангун</option>
                    <option
                    ");
        // line 141
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "25200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 7] Омск,
                    Новосибирск, Кемерово, Юго-Восточная Азия (Бангкок, Джакарта, Ханой)\" value=\"25200\">[UTC + 07:00] Омск, Новосибирск, Кемерово, Юго-Восточная Азия (Бангкок, Джакарта, Ханой)</option>
                    <option
                    ");
        // line 144
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "28800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 8] Красноярс, Улан-Батор, Куала-Лумпур, Гонконг, Китай, Сингапур, Тайвань, западноавстралийское время\"
                    value=\"28800\">[UTC + 08:00] Красноярск, Улан-Батор, Куала-Лумпур, Гонконг, Китай, Сингапур,
                    Тайвань, западноавстралийское время</option>
                    <option
                    ");
        // line 148
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "31500")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 8:45]
                    Юго-восточная Западная Австралия\" value=\"31500\">[UTC + 08:45] Юго-восточная Западная Австралия</option>
                    <option
                    ");
        // line 151
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "32400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 9] Иркутское
                    время, Корея, Япония\" value=\"32400\">[UTC + 09:00] Иркутское время, Корея, Япония</option>
                    <option
                    ");
        // line 154
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "34200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 9:30]
                    Центральноавстралийское время\" value=\"34200\">[UTC + 09:30] Центральноавстралийское время</option>
                    <option
                    ");
        // line 157
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "36000")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 10] Якутск, Восточноавстралийское время (Брисбен, Канберра, Мельбурн, Сидней),
                    Западно-тихоокеанское время\" value=\"36000\">[UTC + 10:00] Якутск, Восточноавстралийское время
                    (Брисбен, Канберра, Мельбурн, Сидней), Западно-тихоокеанское время</option>
                    <option
                    ");
        // line 161
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "37800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 10:30] Лорд-Хау\"
                    value=\"37800\">[UTC + 10:30] Лорд-Хау</option>
                    <option
                    ");
        // line 164
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "39600")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 11]
                    Владивостокское время, Центрально-тихоокеанское время (Соломоновы Острова, Новая Каледония)\"
                    value=\"39600\">[UTC + 11:00] Владивостокское время, Центрально-тихоокеанское время (Соломоновы Острова,
                    Новая Каледония)</option>
                    <option
                    ");
        // line 169
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "41400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 11:30] Остров
                    Норфолк\" value=\"41400\">[UTC + 11:30] Остров Норфолк</option>
                    <option
                    ");
        // line 172
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "43200")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 12] Магаданское
                    время, Маршалловы Острова, Фиджи, Новая Зеландия\" value=\"43200\">[UTC + 12:00] Магаданское время,
                    Маршалловы Острова, Фиджи, Новая Зеландия</option>
                    <option
                    ");
        // line 176
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "46800")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 13] Острова
                    Феникс, Тонга\" value=\"46800\">[UTC + 13:00] Острова Феникс, Тонга</option>
                    <option
                    ");
        // line 179
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == "50400")) {
            echo \layout::func_from_text("selected='selected'");
        }
        echo \layout::func_from_text(" title=\"[UTC + 14] Остров Лайн\"
                    value=\"50400\">[UTC + 14:00] Остров Лайн</option>
                </select>
                <div style=\"white-space: nowrap;\">Часовой пояс на вашем компьютере: <span id=\"localTZ\"></span></div>
                <a href=\"\" class=\"btn btn-primary\" id=\"save_profile\" style=\"margin-top: 20px;\">Сохранить профиль</a>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
    ");
        // line 190
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "new"))) {
            // line 191
            echo \layout::func_from_text("
    <div class=\"col-xs-4\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Смена пароля</div>
            <div class=\"panel-body\">
                <form id=\"change_password_form\" class=\"form-horizontal\">
                    <input type=\"hidden\" name=\"act\" value=\"change_password\">
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"password\" class=\"form-control\" name=\"old_pass\" placeholder=\"Текущий пароль\" /></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"password\" class=\"form-control\" name=\"new_pass\" placeholder=\"Новый пароль\" /></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"password\" class=\"form-control\" name=\"repeat_pass\" placeholder=\"Повтор пароля\" /></div>
                            <a class=\"btn btn-primary\" href=\"\" id=\"change_password\" style=\"margin-top: 10px;\">Сменить пароль</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Смена адреса электронной почты</div>
            <div class=\"panel-body\">
                <form ");
            // line 221
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail")) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text(" id=\"change_email_form\" class=\"form-horizontal\">
                    <input type=\"hidden\" name=\"act\" value=\"change_email\">
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"text\" class=\"form-control\" readonly=\"readonly\" name=\"old_email\" value=\"");
            // line 225
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "email"), "html", null, true));
            echo \layout::func_from_text("\" placeholder=\"Текущий e-mail\" /></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"text\" class=\"form-control\" name=\"new_email\" value=\"\" placeholder=\"Новый email\"></div>
                            <div>Вам необходимо иметь доступ к обоим почтовым ящикам, на них будет выслано два уникальных кода подтверждения операции</div>
                            <a class=\"btn btn-primary\" href=\"\" id=\"change_email\" style=\"margin-top: 10px;\">Сменить адрес</a>
                        </div>
                    </div>
                </form>
                <div id=\"not_change_email\" ");
            // line 236
            if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail"))) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text(">
                    <div>
                        На данный момент вы находитесь в процессе смены адреса электронной почты. Вам необходимо подтвердить
                        <span id=\"emails\">
                        ");
            // line 240
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
                // line 241
                echo \layout::func_from_text("                            <span style=\"color:#FF5400;\">");
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
            // line 242
            echo \layout::func_from_text("                        </span>
                    </div>
                    <a class=\"btn btn-danger\" href=\"#\" id=\"cancel_change_email\" style=\"margin-top: 10px;\">Отменить</a>
                </div>
            </div>
        </div>
    </div>
    <div class=\"clearfix\"></div>
");
        }
        // line 251
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
        return array (  576 => 251,  565 => 242,  546 => 241,  529 => 240,  520 => 236,  506 => 225,  497 => 221,  465 => 191,  463 => 190,  447 => 179,  439 => 176,  430 => 172,  422 => 169,  412 => 164,  404 => 161,  395 => 157,  387 => 154,  379 => 151,  371 => 148,  362 => 144,  354 => 141,  346 => 138,  336 => 133,  328 => 130,  320 => 127,  311 => 123,  303 => 120,  295 => 117,  287 => 114,  278 => 110,  269 => 106,  260 => 102,  251 => 98,  243 => 95,  235 => 92,  226 => 88,  218 => 85,  209 => 81,  199 => 76,  190 => 72,  181 => 68,  173 => 65,  165 => 62,  157 => 59,  149 => 56,  142 => 51,  134 => 48,  124 => 46,  114 => 44,  112 => 43,  105 => 41,  102 => 40,  98 => 39,  92 => 36,  83 => 30,  74 => 24,  67 => 20,  58 => 13,  56 => 12,  53 => 11,  47 => 8,  44 => 7,  41 => 6,  33 => 3,  30 => 2,);
    }
}
