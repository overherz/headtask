<?php

/* applications/users/layouts/edit.html */
class __TwigTemplate_43a662d758f170d121846e6552cd3b6e1bd756979b6bea58c0b96d766b1e333c extends Twig_Template
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
            <label class=\"col-lg-2 control-label\" for=\"fio\">Имя</label>
            <div class=\"col-lg-10\">
                <input type=\"text\" name=\"first_name\" id=\"first_name\" value=\"");
        // line 24
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"form-control\" />
             </div>
        </div>
        <div class=\"form-group\">
            <label class=\"col-lg-2 control-label\" for=\"fio\">Фамилия</label>
            <div class=\"col-lg-10\">
                <input type=\"text\" name=\"last_name\" id=\"last_name\" value=\"");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_name"), "html", null, true));
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
                    ");
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tz"]) ? $context["tz"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["t"]) {
            // line 56
            echo \layout::func_from_text("                        <option ");
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == (isset($context["k"]) ? $context["k"] : null))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
            echo \layout::func_from_text("\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
            echo \layout::func_from_text("</option>
                    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo \layout::func_from_text("                </select>
                <div style=\"white-space: nowrap;\">Часовой пояс на вашем компьютере: <span id=\"localTZ\"></span></div>
                <a href=\"\" class=\"btn btn-primary\" id=\"save_profile\" style=\"margin-top: 20px;\">Сохранить профиль</a>
            </div>
        </div>
    </form>
    </div>
</div>
</div>
    ");
        // line 67
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "new"))) {
            // line 68
            echo \layout::func_from_text("
    <div class=\"col-xs-4\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">Смена пароля</div>
            <div class=\"panel-body\">
                <form id=\"change_password_form\" class=\"form-horizontal\">
                    <input type=\"hidden\" name=\"act\" value=\"change_password\">
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"password\" class=\"form-control\" name=\"old_pass\" placeholder=\"Текущий пароль\" value=\"\" /></div>
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
            // line 98
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail")) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text(" id=\"change_email_form\" class=\"form-horizontal\">
                    <input type=\"hidden\" name=\"act\" value=\"change_email\">
                    <div class=\"form-group\">
                        <div class=\"col-lg-10\">
                            <div><input type=\"text\" class=\"form-control\" readonly=\"readonly\" name=\"old_email\" value=\"");
            // line 102
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
            // line 113
            if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "changemail"))) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text(">
                    <div>
                        На данный момент вы находитесь в процессе смены адреса электронной почты. Вам необходимо подтвердить
                        <span id=\"emails\">
                        ");
            // line 117
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
                // line 118
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
            // line 119
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
        // line 128
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/users/layouts/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 128,  282 => 119,  263 => 118,  246 => 117,  237 => 113,  223 => 102,  214 => 98,  182 => 68,  180 => 67,  169 => 58,  152 => 56,  148 => 55,  142 => 51,  134 => 48,  124 => 46,  114 => 44,  112 => 43,  105 => 41,  102 => 40,  98 => 39,  92 => 36,  83 => 30,  74 => 24,  67 => 20,  58 => 13,  56 => 12,  53 => 11,  47 => 8,  44 => 7,  41 => 6,  33 => 3,  30 => 2,);
    }
}
