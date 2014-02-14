<?php

/* applications\users\layouts\users_table.html */
class __TwigTemplate_4f7942b57bdf4b0ce17cf3b109007785321790d660b46d32973296999881360c extends Twig_Template
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
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("<table class=\"table table-bordered table-condensed table-hover\">
    <tr>
        <th style=\"width: 100px;\"></th>
        <th>Имя</th>
        <th>Группа</th>
        <th style=\"width: 10px;\">Статус</th>
        <th style=\"width: 200px;\">Контакты</th>
        <th style=\"width: 1px;\">Активность</th>
    </tr>
    ");
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 12
            echo \layout::func_from_text("    <tr>
        <td style=\"text-align: center;\"><a href=\"/users/~");
            // line 13
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\">");
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "avatar")) {
                echo \layout::func_from_text("<img src=\"/uploads/users/ava_small/");
                echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "avatar")), "html", null, true));
                echo \layout::func_from_text("\" class=\"img-polaroid\">");
            } else {
                echo \layout::func_from_text("<img src='/source/images/no-ava-small.jpg' class=\"img-polaroid\">");
            }
            echo \layout::func_from_text("</a></td>
        <td><a href=\"/users/~");
            // line 14
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"font-weight: bold;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</a><div class=\"nickname\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "nickname"), "html", null, true));
            echo \layout::func_from_text("</div></td>
        <td style=\"color:");
            // line 15
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";font-weight: bold;white-space: nowrap;width: 1px;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("</td>
        <td style=\"text-align: center;\">
            ");
            // line 17
            if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action") >= $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "time"))) {
                // line 18
                echo \layout::func_from_text("                <div class=\"user_online big\"></div>
            ");
            } else {
                // line 20
                echo \layout::func_from_text("                <div class=\"user_offline big\"></div>
            ");
            }
            // line 22
            echo \layout::func_from_text("        </td>
        <td>
            ");
            // line 24
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">Skype:</span> <a href=\"skype:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("?chat\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("</a>");
            }
            echo \layout::func_from_text("</div>
            ");
            // line 25
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")) {
                echo \layout::func_from_text("<div><span style=\"font-weight: bold;\">М. тел:</span> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone"), "html", null, true));
            }
            echo \layout::func_from_text("</div>
            ");
            // line 26
            if (((!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) && (!$this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")))) {
                echo \layout::func_from_text("&nbsp;");
            }
            // line 27
            echo \layout::func_from_text("        </td>
        <td>
            ");
            // line 29
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action")) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
                echo \layout::func_from_text("
            ");
            } else {
                // line 30
                echo \layout::func_from_text("дата неизвестна
            ");
            }
            // line 32
            echo \layout::func_from_text("        </td>
    </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 35
            echo \layout::func_from_text("    <tr><td colspan=\"6\">Пользователи не найдены</td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo \layout::func_from_text("</table>
");
        // line 38
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\users_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 38,  130 => 37,  123 => 35,  116 => 32,  112 => 30,  106 => 29,  102 => 27,  98 => 26,  91 => 25,  81 => 24,  77 => 22,  73 => 20,  69 => 18,  67 => 17,  60 => 15,  52 => 14,  40 => 13,  37 => 12,  32 => 11,  21 => 2,  19 => 1,);
    }
}
