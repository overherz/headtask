<?php

/* /applications/projects/layouts/calendar/month.html */
class __TwigTemplate_a9b861456908dd858ed9230fa4c27d5a10b8d05c6ae7b2f8cc25127dcb8ad679 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<div style=\"float: left;\"><a href=\"\" show_legend>Показать легенду</a></div>
<div id=\"legend\">
    <table>
        <td valign=\"top\" style=\"padding-right: 20px;\">
            <i class=\"fa fa-clock-o\"></i> - Дата начала и окончания совпадают<br>
            <i class=\"fa fa-play\"></i> - Дата начала<br>
            <i class=\"fa fa-stop\"></i> - Дата окончания<br>
        </td>
        <td valign=\"top\">
            <span style=\"color:red;\">Просроченная задача</span><br>
            <table class=\"table table-condensed\"><tr class=\"warning\"><td style=\"border: none;\">Чужая задача в проекте, где вы являетесь менеджером, <br /> или которую создавали Вы</td></tr></table>
        </td>
    </table>
</div>
<div>
    <div style=\"float: right;\"><a href=\"\" weekend_hide style=\"display: none;margin: 0 10px;\">Показать выходные</a><a href=\"\" weekend_show style=\"display: none;margin: 0 10px;\">Скрыть выходные</a>&nbsp;
        <a href=\"\" style=\"margin: 0 10px;\">Актуальный месяц</a>
    </div>
</div>

<script>
    arr = {
        ");
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 24
            echo \layout::func_from_text("        '");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("': {
            'name':'");
            // line 25
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("',
            ");
            // line 26
            if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned") != $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                echo \layout::func_from_text("'class':'warning',");
            }
            // line 27
            echo \layout::func_from_text("            'title':'Проект \"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "project_name"), "html", null, true));
            echo \layout::func_from_text("\"");
            if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned_name")) {
                echo \layout::func_from_text(". Ответственный ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned_name"), "html", null, true));
            }
            echo \layout::func_from_text("',
            ");
            // line 28
            if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") && ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") < (isset($context["current_date"]) ? $context["current_date"] : null)))) {
                echo \layout::func_from_text("'color':'red'");
            }
            // line 29
            echo \layout::func_from_text("    },
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo \layout::func_from_text("    }
</script>

<section class=\"month\" style=\"clear: both;\">
    <h2 style=\"text-align: center;\">
        <a class=\"arrow\" href=\"\" month='");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["prevMonth"]) ? $context["prevMonth"] : null), "year"), "html", null, true));
        echo \layout::func_from_text(":");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["prevMonth"]) ? $context["prevMonth"] : null), "month"), "html", null, true));
        echo \layout::func_from_text("'>&larr;</a>
        <a href=\"\" get_months=\"");
        // line 37
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "year"), "int"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "name")), "html", null, true));
        echo \layout::func_from_text(" ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "year"), "int"), "html", null, true));
        echo \layout::func_from_text("</a>
        <a class=\"arrow\" href=\"\" month='");
        // line 38
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nextMonth"]) ? $context["nextMonth"] : null), "year"), "html", null, true));
        echo \layout::func_from_text(":");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nextMonth"]) ? $context["nextMonth"] : null), "month"), "html", null, true));
        echo \layout::func_from_text("'>&rarr;</a>
    </h2>

    <table class=\"table table-bordered calendar_table\">
        <tr>
            ");
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "weeks"), "first"), "days"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["weekDay"]) {
            // line 44
            echo \layout::func_from_text("            <th ");
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") > 5)) {
                echo \layout::func_from_text("class=\"weekend\" ");
                if ((!(isset($context["weekend"]) ? $context["weekend"] : null))) {
                    echo \layout::func_from_text("style='display:none;'");
                }
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, lang($this->getAttribute((isset($context["weekDay"]) ? $context["weekDay"] : null), "shortname")), "html", null, true));
            echo \layout::func_from_text("</th>
            ");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weekDay'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo \layout::func_from_text("        </tr>
        ");
        // line 47
        $context["day_int"] = 0;
        // line 48
        echo \layout::func_from_text("        ");
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "weeks", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["week"]) {
            // line 49
            echo \layout::func_from_text("        <tr>
            ");
            // line 50
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["week"]) ? $context["week"] : null), "days"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
                // line 51
                echo \layout::func_from_text("            ");
                $context["day_int"] = ((isset($context["day_int"]) ? $context["day_int"] : null) + 1);
                // line 52
                echo \layout::func_from_text("            ");
                $context["counter"] = 0;
                // line 53
                echo \layout::func_from_text("            <td ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") > 5)) {
                    echo \layout::func_from_text("class=\"weekend ");
                    if ((!(isset($context["weekend"]) ? $context["weekend"] : null))) {
                        echo \layout::func_from_text("weekend_hide");
                    }
                    echo \layout::func_from_text("\"");
                }
                echo \layout::func_from_text(" style='padding: 0px;background: #fff;'>
            ");
                // line 54
                if (($this->getAttribute((isset($context["day"]) ? $context["day"] : null), "month") == (isset($context["currentMonth"]) ? $context["currentMonth"] : null))) {
                    // line 55
                    echo \layout::func_from_text("            <div class=\"day_div\" ");
                    if (($this->getAttribute((isset($context["day"]) ? $context["day"] : null), "isToday") && ($this->getAttribute((isset($context["day"]) ? $context["day"] : null), "month") == (isset($context["currentMonth"]) ? $context["currentMonth"] : null)))) {
                        echo \layout::func_from_text("style='color:red;font-weight: bold;'");
                    }
                    echo \layout::func_from_text(">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["day"]) ? $context["day"] : null), "int"), "html", null, true));
                    echo \layout::func_from_text("</div>
                ");
                    // line 56
                    $context["date"] = (((($this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "year"), "int") . "-") . $this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "month"), "intString")) . "-") . $this->getAttribute((isset($context["day"]) ? $context["day"] : null), "intString"));
                    // line 57
                    echo \layout::func_from_text("                ");
                    if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
                        // line 58
                        echo \layout::func_from_text("                <table class=\"table table-condensed table-hover tasks_table\" id=\"day");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["day"]) ? $context["day"] : null), "int"), "html", null, true));
                        echo \layout::func_from_text("\">
                ");
                        // line 59
                        $context["values"] = array();
                        // line 60
                        echo \layout::func_from_text("                ");
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                            // line 61
                            echo \layout::func_from_text("                    ");
                            if ((($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start") <= (isset($context["date"]) ? $context["date"] : null)) && (((($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") != "") && ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") >= (isset($context["date"]) ? $context["date"] : null))) || (!$this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end"))) || ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") < (isset($context["current_date"]) ? $context["current_date"] : null))))) {
                                // line 62
                                echo \layout::func_from_text("                    ");
                                if ((((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start")) || ((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end")))) {
                                    // line 63
                                    echo \layout::func_from_text("                        <tr class=\"");
                                    if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned") != $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                                        echo \layout::func_from_text("warning");
                                    }
                                    echo \layout::func_from_text(" ");
                                    if ((((isset($context["date"]) ? $context["date"] : null) != $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start")) && ((isset($context["date"]) ? $context["date"] : null) != $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end")))) {
                                        echo \layout::func_from_text("hide_tasks");
                                    }
                                    echo \layout::func_from_text("\">
                            ");
                                    // line 64
                                    $context["color"] = "999";
                                    // line 65
                                    echo \layout::func_from_text("                            ");
                                    if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "priority") == "2")) {
                                        $context["color"] = "468847";
                                        // line 66
                                        echo \layout::func_from_text("                            ");
                                    } elseif (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "priority") == "3")) {
                                        $context["color"] = "F89406";
                                        // line 67
                                        echo \layout::func_from_text("                            ");
                                    } elseif (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "priority") == "4")) {
                                        $context["color"] = "B94A48";
                                        // line 68
                                        echo \layout::func_from_text("                            ");
                                    }
                                    // line 69
                                    echo \layout::func_from_text("                            <td style=\"width: 18px;border-left:none;padding-right: 0px;\">
                                ");
                                    // line 70
                                    if ((((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start")) && ((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end")))) {
                                        echo \layout::func_from_text("<span class=\"fa fa-clock-o\" style=\"color:#");
                                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                        echo \layout::func_from_text("\"></span>
                                ");
                                    } elseif (((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start"))) {
                                        // line 71
                                        echo \layout::func_from_text("<span class=\"fa fa-play\" style=\"color:#");
                                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                        echo \layout::func_from_text("\"></span>
                                ");
                                    } elseif (((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end"))) {
                                        // line 72
                                        echo \layout::func_from_text("<span class=\"fa fa-stop\" style=\"color:#");
                                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                        echo \layout::func_from_text("\"></span>
                                ");
                                    }
                                    // line 74
                                    echo \layout::func_from_text("                            </td>
                            <td style=\"border-left: none;padding-left: 3px;\">
                                <a href=\"/projects/tasks/show/");
                                    // line 76
                                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
                                    echo \layout::func_from_text("/\" ");
                                    if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") && ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") < (isset($context["current_date"]) ? $context["current_date"] : null)))) {
                                        echo \layout::func_from_text("style='color:red;'");
                                    }
                                    echo \layout::func_from_text(" title='Проект \"");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "project_name"), "html", null, true));
                                    echo \layout::func_from_text("\"");
                                    if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned_name")) {
                                        echo \layout::func_from_text(". Ответственный ");
                                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned_name"), "html", null, true));
                                    }
                                    echo \layout::func_from_text("'>
                                    <div>");
                                    // line 77
                                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "name"), "html", null, true));
                                    echo \layout::func_from_text("</div>
                                </a>
                            </td>
                        </tr>
                        ");
                                    // line 81
                                    $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                                    // line 82
                                    echo \layout::func_from_text("                        ");
                                } else {
                                    // line 83
                                    echo \layout::func_from_text("                            ");
                                    $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                                    // line 84
                                    echo \layout::func_from_text("                            ");
                                    $context["values"] = twig_array_merge((isset($context["values"]) ? $context["values"] : null), array(0 => $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id")));
                                    // line 85
                                    echo \layout::func_from_text("                        ");
                                }
                                // line 86
                                echo \layout::func_from_text("                        ");
                                if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")) {
                                    // line 87
                                    echo \layout::func_from_text("                            <tr><td style=\"text-align: center;margin-top: 10px;border-left: none;\" colspan=\"2\"><a href=\"\" show_hide_tasks data-day=\"");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["day"]) ? $context["day"] : null), "int"), "html", null, true));
                                    echo \layout::func_from_text("\" data-values=\"");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_join_filter((isset($context["values"]) ? $context["values"] : null), ","), "html", null, true));
                                    echo \layout::func_from_text("\"><div style=\"font-weight: bold;\">Всего ");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["counter"]) ? $context["counter"] : null), "html", null, true));
                                    echo \layout::func_from_text("</div></a></td></tr>
                        ");
                                }
                                // line 89
                                echo \layout::func_from_text("                    ");
                            }
                            // line 90
                            echo \layout::func_from_text("                ");
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 91
                        echo \layout::func_from_text("                </table>
                ");
                    }
                    // line 93
                    echo \layout::func_from_text("            ");
                }
                // line 94
                echo \layout::func_from_text("            </td>
            ");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo \layout::func_from_text("        </tr>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['week'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo \layout::func_from_text("    </table>
</section>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/calendar/month.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  396 => 98,  389 => 96,  374 => 94,  371 => 93,  367 => 91,  353 => 90,  350 => 89,  340 => 87,  337 => 86,  334 => 85,  331 => 84,  328 => 83,  325 => 82,  323 => 81,  316 => 77,  301 => 76,  297 => 74,  291 => 72,  285 => 71,  278 => 70,  275 => 69,  272 => 68,  268 => 67,  264 => 66,  260 => 65,  258 => 64,  247 => 63,  244 => 62,  241 => 61,  223 => 60,  221 => 59,  216 => 58,  213 => 57,  211 => 56,  202 => 55,  200 => 54,  189 => 53,  186 => 52,  183 => 51,  166 => 50,  163 => 49,  158 => 48,  156 => 47,  153 => 46,  129 => 44,  112 => 43,  102 => 38,  94 => 37,  88 => 36,  81 => 31,  74 => 29,  70 => 28,  60 => 27,  56 => 26,  52 => 25,  47 => 24,  43 => 23,  19 => 1,);
    }
}
