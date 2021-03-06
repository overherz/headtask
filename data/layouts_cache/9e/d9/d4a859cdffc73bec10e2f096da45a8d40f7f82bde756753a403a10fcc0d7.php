<?php

/* applications/projects/layouts/users/add_user.html */
class __TwigTemplate_9ed9d4a859cdffc73bec10e2f096da45a8d40f7f82bde756753a403a10fcc0d7 extends Twig_Template
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
        if ((isset($context["user"]) ? $context["user"] : null)) {
            echo \layout::func_from_text("Редактирование участника");
        } else {
            echo \layout::func_from_text("Добавление участника");
        }
        echo \layout::func_from_text(". Проект ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("
");
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
        echo \layout::func_from_text("\"></script>
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
        <div>
            ");
        // line 23
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"))) {
            // line 24
            echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-1 control-label\"></label>
                <div class=\"col-lg-6\">
                    <input type='text' class='form-control search_user' placeholder='Фильтр'>
                </div>
            </div>
            ");
        }
        // line 31
        echo \layout::func_from_text("            <div class=\"form-group\">
                <label class=\"col-lg-1 control-label\" for=\"name\">Участник</label>
                <div class=\"col-lg-6\">
                    ");
        // line 34
        if (((isset($context["mode"]) ? $context["mode"] : null) == "add")) {
            // line 35
            echo \layout::func_from_text("
                        <select name=\"new_user\" ");
            // line 36
            if ((!(isset($context["users"]) ? $context["users"] : null))) {
                echo \layout::func_from_text("disabled");
            }
            echo \layout::func_from_text(">
                            ");
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                // line 38
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
                // line 40
                echo \layout::func_from_text("                                <option>Ничего не найдено</option>
                            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo \layout::func_from_text("                        </select>
                    ");
        } else {
            // line 44
            echo \layout::func_from_text("                        <div style=\"font-weight: bold;padding-top: 7px;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</div>
                    ");
        }
        // line 46
        echo \layout::func_from_text("                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-lg-1 control-label\" for=\"role\">Роль</label>
                <div class=\"col-lg-6\">
                    <select name=\"role\">
                        <option value=\"manager\">Менеджер</option>
                        <option value=\"user\" ");
        // line 53
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "role") == "user")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">Участник проекта</option>
                    </select>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-lg-1 control-label\" for=\"description\">Описание</label>
                <div class=\"col-lg-6\">
                    <input type=\"text\" name=\"description\" value=\"");
        // line 60
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("\" class=\"form-control\">
                </div>
            </div>
            <div class=\"form-group\" id=\"control-group-rights\" ");
        // line 63
        if ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "role") == "manager") || (!(isset($context["user"]) ? $context["user"] : null)))) {
            echo \layout::func_from_text("style=\"display: none;\"");
        }
        echo \layout::func_from_text(">
                <label class=\"col-lg-1 control-label\" for=\"rights\">Права</label>
                <div class=\"col-lg-11\">
                    <table class=\"table table-bordered table-condensed\" style=\"width: auto;\">
                        <tr>
                            <th style=\"width: 150px;\">Группа прав</th>
                            <th>Права</th>
                        </tr>
                        ");
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rights"]) ? $context["rights"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["r"]) {
            // line 72
            echo \layout::func_from_text("                        <tr>
                            <td><input type=\"checkbox\" class=\"users_checkbox\"> <span style=\"margin-left: 3px;\">");
            // line 73
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["r"]) ? $context["r"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</span></td>
                            <td class=\"rights\">
                                ");
            // line 75
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["r"]) ? $context["r"] : null), "rights"));
            foreach ($context['_seq'] as $context["_key"] => $context["rr"]) {
                // line 76
                echo \layout::func_from_text("                                    <div style=\"margin: 5px;display: inline-block;\"><input type=\"checkbox\" name=\"rights[");
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
            // line 78
            echo \layout::func_from_text("                            </td>
                        </tr>
                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['r'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo \layout::func_from_text("                    </table>
                </div>
            </div>
            <div style=\"text-align: center\">
                <button class=\"btn btn-lg btn-primary save_user\" type=\"button\">");
        // line 85
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
        return "applications/projects/layouts/users/add_user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 85,  219 => 81,  211 => 78,  196 => 76,  192 => 75,  187 => 73,  184 => 72,  180 => 71,  167 => 63,  161 => 60,  149 => 53,  140 => 46,  134 => 44,  130 => 42,  123 => 40,  112 => 38,  107 => 37,  101 => 36,  98 => 35,  96 => 34,  91 => 31,  82 => 24,  80 => 23,  76 => 21,  70 => 20,  66 => 18,  63 => 17,  52 => 9,  47 => 8,  44 => 7,  31 => 4,  28 => 3,);
    }
}
