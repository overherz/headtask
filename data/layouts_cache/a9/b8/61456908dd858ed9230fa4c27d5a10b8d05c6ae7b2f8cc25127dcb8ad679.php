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
            <i class=\"fa fa-arrow-left\"></i> - Задание началось в предыдущие дни
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

<section class=\"month\" style=\"clear: both;\">
    <h2 style=\"text-align: center;\">
        <a class=\"arrow\" href=\"\" month='");
        // line 24
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["prevMonth"]) ? $context["prevMonth"] : null), "year"), "html", null, true));
        echo \layout::func_from_text(":");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["prevMonth"]) ? $context["prevMonth"] : null), "month"), "html", null, true));
        echo \layout::func_from_text("'>&larr;</a>
        <a href=\"\" get_months=\"");
        // line 25
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "year"), "int"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "name"), "html", null, true));
        echo \layout::func_from_text(" ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "year"), "int"), "html", null, true));
        echo \layout::func_from_text("</a>
        <a class=\"arrow\" href=\"\" month='");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nextMonth"]) ? $context["nextMonth"] : null), "year"), "html", null, true));
        echo \layout::func_from_text(":");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nextMonth"]) ? $context["nextMonth"] : null), "month"), "html", null, true));
        echo \layout::func_from_text("'>&rarr;</a>
    </h2>

    <table class=\"table table-bordered calendar_table\">
        <tr>
            ");
        // line 31
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
            // line 32
            echo \layout::func_from_text("            <th ");
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") > 5)) {
                echo \layout::func_from_text("class=\"weekend\" ");
                if ((!(isset($context["weekend"]) ? $context["weekend"] : null))) {
                    echo \layout::func_from_text("style='display:none;'");
                }
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["weekDay"]) ? $context["weekDay"] : null), "shortname"), "html", null, true));
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
        // line 34
        echo \layout::func_from_text("        </tr>
        ");
        // line 35
        $context["day_int"] = 0;
        // line 36
        echo \layout::func_from_text("        ");
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "weeks", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["week"]) {
            // line 37
            echo \layout::func_from_text("        <tr>
            ");
            // line 38
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
                // line 39
                echo \layout::func_from_text("            ");
                $context["day_int"] = ((isset($context["day_int"]) ? $context["day_int"] : null) + 1);
                // line 40
                echo \layout::func_from_text("            ");
                $context["counter"] = 1;
                // line 41
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
                // line 42
                if (($this->getAttribute((isset($context["day"]) ? $context["day"] : null), "month") == (isset($context["currentMonth"]) ? $context["currentMonth"] : null))) {
                    // line 43
                    echo \layout::func_from_text("            <div class=\"day_div badge ");
                    if (($this->getAttribute((isset($context["day"]) ? $context["day"] : null), "isToday") && ($this->getAttribute((isset($context["day"]) ? $context["day"] : null), "month") == (isset($context["currentMonth"]) ? $context["currentMonth"] : null)))) {
                        echo \layout::func_from_text("badge-success success");
                    } else {
                        echo \layout::func_from_text("badge-info");
                    }
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["day"]) ? $context["day"] : null), "int"), "html", null, true));
                    echo \layout::func_from_text("</div>
                ");
                    // line 44
                    $context["date"] = (((($this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "year"), "int") . "-") . $this->getAttribute($this->getAttribute((isset($context["currentMonth"]) ? $context["currentMonth"] : null), "month"), "intString")) . "-") . $this->getAttribute((isset($context["day"]) ? $context["day"] : null), "intString"));
                    // line 45
                    echo \layout::func_from_text("                ");
                    if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
                        // line 46
                        echo \layout::func_from_text("                <table class=\"table table-condensed table-hover tasks_table\" style=\"background: transparent;\">
                ");
                        // line 47
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                            // line 48
                            echo \layout::func_from_text("                    ");
                            if ((($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start") <= (isset($context["date"]) ? $context["date"] : null)) && (((($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") != "") && ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") >= (isset($context["date"]) ? $context["date"] : null))) || (!$this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end"))) || ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end") < (isset($context["current_date"]) ? $context["current_date"] : null))))) {
                                // line 49
                                echo \layout::func_from_text("                    ");
                                if ((((isset($context["counter"]) ? $context["counter"] : null) > 8) && (!(isset($context["show_all"]) ? $context["show_all"] : null)))) {
                                    $context["show_all"] = true;
                                    echo \layout::func_from_text("<tr><td style=\"text-align: center;margin-top: 10px;border-left: none;\" colspan=\"2\"><a href=\"\" show_hide_tasks><div>Показать остальные</div></a></td></tr>");
                                }
                                // line 50
                                echo \layout::func_from_text("                    <tr class=\"");
                                if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "assigned") != $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
                                    echo \layout::func_from_text("warning");
                                }
                                echo \layout::func_from_text(" ");
                                if (((isset($context["counter"]) ? $context["counter"] : null) > 8)) {
                                    echo \layout::func_from_text("hide_tasks");
                                }
                                echo \layout::func_from_text("\">
                        ");
                                // line 51
                                $context["color"] = "999";
                                // line 52
                                echo \layout::func_from_text("                        ");
                                if (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "priority") == "2")) {
                                    $context["color"] = "468847";
                                    // line 53
                                    echo \layout::func_from_text("                        ");
                                } elseif (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "priority") == "3")) {
                                    $context["color"] = "F89406";
                                    // line 54
                                    echo \layout::func_from_text("                        ");
                                } elseif (($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "priority") == "4")) {
                                    $context["color"] = "B94A48";
                                    // line 55
                                    echo \layout::func_from_text("                        ");
                                }
                                // line 56
                                echo \layout::func_from_text("                        <td style=\"width: 15px;vertical-align: middle !important;border-left:none;padding-right: 0px;\">
                            ");
                                // line 57
                                if ((((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start")) && ((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end")))) {
                                    echo \layout::func_from_text("<span class=\"fa fa-clock-o\" style=\"color:#");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                    echo \layout::func_from_text("\"></span>
                            ");
                                } elseif (((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "start"))) {
                                    // line 58
                                    echo \layout::func_from_text("<span class=\"fa fa-play\" style=\"color:#");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                    echo \layout::func_from_text("\"></span>
                            ");
                                } elseif (((isset($context["date"]) ? $context["date"] : null) == $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "end"))) {
                                    // line 59
                                    echo \layout::func_from_text("<span class=\"fa fa-play\" style=\"color:#");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                    echo \layout::func_from_text("\"></span>
                            ");
                                } else {
                                    // line 60
                                    echo \layout::func_from_text("<span class=\"fa fa-arrow-left\" style=\"color:#");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                                    echo \layout::func_from_text("\"></span>
                            ");
                                }
                                // line 62
                                echo \layout::func_from_text("                        </td>
                        <td style=\"border-left: none;padding-left: 3px;\">
                            <a href=\"/projects/tasks/show/");
                                // line 64
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
                                // line 65
                                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "name"), "html", null, true));
                                echo \layout::func_from_text("</div>
                            </a>
                        </td>
                    </tr>
                        ");
                                // line 69
                                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : null) + 1);
                                // line 70
                                echo \layout::func_from_text("                    ");
                            }
                            // line 71
                            echo \layout::func_from_text("                ");
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 72
                        echo \layout::func_from_text("                </table>
                ");
                    }
                    // line 74
                    echo \layout::func_from_text("            ");
                }
                // line 75
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
            // line 77
            echo \layout::func_from_text("        </tr>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['week'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
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
        return array (  312 => 79,  305 => 77,  290 => 75,  287 => 74,  283 => 72,  277 => 71,  274 => 70,  272 => 69,  265 => 65,  250 => 64,  246 => 62,  240 => 60,  234 => 59,  228 => 58,  221 => 57,  218 => 56,  215 => 55,  211 => 54,  207 => 53,  203 => 52,  201 => 51,  190 => 50,  184 => 49,  181 => 48,  177 => 47,  174 => 46,  171 => 45,  169 => 44,  158 => 43,  156 => 42,  145 => 41,  142 => 40,  139 => 39,  122 => 38,  119 => 37,  114 => 36,  112 => 35,  109 => 34,  85 => 32,  68 => 31,  44 => 24,  19 => 1,  64 => 17,  61 => 16,  58 => 26,  55 => 14,  50 => 25,  47 => 10,  40 => 6,  37 => 5,  31 => 3,);
    }
}
