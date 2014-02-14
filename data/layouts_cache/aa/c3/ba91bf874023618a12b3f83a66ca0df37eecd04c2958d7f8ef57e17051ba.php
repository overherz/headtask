<?php

/* applications\projects\layouts\users/add_user.html */
class __TwigTemplate_aac3ba91bf874023618a12b3f83a66ca0df37eecd04c2958d7f8ef57e17051ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    ");
        if ((isset($context["news"]) ? $context["news"] : null)) {
            echo \layout::func_from_text("Редактирование учвстника");
        } else {
            echo \layout::func_from_text("Добавление участника");
        }
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    ");
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
    <script src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "users.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\" xmlns=\"http://www.w3.org/1999/html\"></script>
    <script>
        \$(document).ready(function (\$) {
            set_users_checkbox();
        });
    </script>
");
    }

    // line 17
    public function block_project_data($context, array $blocks = array())
    {
        // line 18
        echo \layout::func_from_text("    <form id=\"users_form\" class=\"form-horizontal form-small\">
        <input type=\"hidden\" name=\"act\" value=\"save_user\">
        ");
        // line 20
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 21
        echo \layout::func_from_text("
        <div class=\"docs-input-sizes\">
            <div class=\"control-group\">
                <label class=\"control-label\" for=\"name\">Участник</label>
                <div class=\"controls\">
                    ");
        // line 26
        if (((isset($context["mode"]) ? $context["mode"] : null) == "add")) {
            // line 27
            echo \layout::func_from_text("                        <select name=\"new_user\" ");
            if ((!(isset($context["users"]) ? $context["users"] : null))) {
                echo \layout::func_from_text("disabled");
            }
            echo \layout::func_from_text(">
                            ");
            // line 28
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                // line 29
                echo \layout::func_from_text("                                <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                echo \layout::func_from_text("\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
                echo \layout::func_from_text("</option>
                            ");
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 31
                echo \layout::func_from_text("                                <option>Ничего не найдено</option>
                            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo \layout::func_from_text("                        </select>
                        <input type='text' class='input-medium search_user' placeholder='Фильтр'>
                    ");
        } else {
            // line 36
            echo \layout::func_from_text("                        <span style=\"font-weight: bold;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</span>
                    ");
        }
        // line 38
        echo \layout::func_from_text("                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\" for=\"role\">Роль</label>
                <div class=\"controls\">
                    <select name=\"role\">
                        <option value=\"manager\">Менеджер</option>
                        <option value=\"user\" ");
        // line 45
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "role") == "user")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">Участник проекта</option>
                    </select>
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\" for=\"description\">Описание</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"description\" value=\"");
        // line 52
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("\" class=\"span6\">
                </div>
            </div>
            <div class=\"control-group\" id=\"control-group-rights\" ");
        // line 55
        if ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "role") == "manager") || (!(isset($context["user"]) ? $context["user"] : null)))) {
            echo \layout::func_from_text("style=\"display: none;\"");
        }
        echo \layout::func_from_text(">
                <label class=\"control-label\" for=\"rights\">Права</label>
                <div class=\"controls\">
                    <table class=\"table table-bordered table-condensed\" style=\"width: auto;\">
                        <tr>
                            <th style=\"width: 150px;\">Группа прав</th>
                            <th>Права</th>
                        </tr>
                        ");
        // line 63
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rights"]) ? $context["rights"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["r"]) {
            // line 64
            echo \layout::func_from_text("                        <tr>
                            <td><input type=\"checkbox\" class=\"users_checkbox\"> <span style=\"margin-left: 3px;\">");
            // line 65
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</span></td>
                            <td class=\"rights\">
                                ");
            // line 67
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "rights"));
            foreach ($context['_seq'] as $context["_key"] => $context["rr"]) {
                // line 68
                echo \layout::func_from_text("                                    <div style=\"margin: 5px;\"><input type=\"checkbox\" name=\"rights[");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["rr"]) ? $context["rr"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("]\" value=\"1\" ");
                if (twig_in_filter($this->getAttribute((isset($context["rr"]) ? $context["rr"] : null), "id"), (isset($context["have_rights"]) ? $context["have_rights"] : null))) {
                    echo \layout::func_from_text("checked");
                }
                echo \layout::func_from_text("> <span style=\"margin-left: 3px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["rr"]) ? $context["rr"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</span></div>
                                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo \layout::func_from_text("                            </td>
                        </tr>
                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo \layout::func_from_text("                    </table>
                </div>
            </div>
            <div style=\"text-align: center\">
                <button class=\"btn btn-large btn-primary save_user\" type=\"button\">");
        // line 77
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id")) {
            echo \layout::func_from_text("Сохранить");
        } else {
            echo \layout::func_from_text("Создать");
        }
        echo \layout::func_from_text("</button>
            </div>
        </div>
    </form>
    <div class=\"clearfix\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\users/add_user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 77,  201 => 73,  193 => 70,  178 => 68,  174 => 67,  169 => 65,  166 => 64,  162 => 63,  149 => 55,  143 => 52,  131 => 45,  122 => 38,  116 => 36,  111 => 33,  104 => 31,  93 => 29,  88 => 28,  81 => 27,  79 => 26,  72 => 21,  66 => 20,  62 => 18,  59 => 17,  48 => 9,  43 => 8,  40 => 7,  31 => 4,  28 => 3,);
    }
}
