<?php

/* /applications/users/layouts/users_table.html */
class __TwigTemplate_4b3d54593a2ebe4a2768c98d51c04608ace0ec6ac7232432a9773ba208e961c0 extends Twig_Template
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
        echo \layout::func_from_text("
<div class=\"container-fluid\" style=\"padding: 0;\">
    <div class=\"row\">
        ");
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 6
            echo \layout::func_from_text("        <div class=\"col-lg-2 col-md-3 col-sm-4 col-xs-4 user_card\">
            <div class=\"user_sub_card\">
                <h4 style=\"margin-top: 0;\"><a href=\"/users/~");
            // line 8
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_name"), "html", null, true));
            echo \layout::func_from_text("<br>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "first_name"), "html", null, true));
            echo \layout::func_from_text("</a></h4>
                <div style=\"position: relative;;\">
                    <a href=\"/users/~");
            // line 10
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\"><img class=\"img-circle img-responsive\" src=\"");
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "avatar")) {
                echo \layout::func_from_text("/uploads/users/ava_middle/");
                echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "avatar")), "html", null, true));
            } else {
                echo \layout::func_from_text("/source/images/no-ava-profile.jpg");
            }
            echo \layout::func_from_text("\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("\"></a>
                </div>
                <small>");
            // line 12
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("
                    <div class=\"user_");
            // line 13
            if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action") >= $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "time"))) {
                echo \layout::func_from_text("online");
            } else {
                echo \layout::func_from_text("offline");
            }
            echo \layout::func_from_text("\"></div>
                    <div>
                        ");
            // line 15
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename")) {
                echo \layout::func_from_text("<span style=\"font-weight: bold;\">Skype: </span><a href=\"skype:");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("?chat\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "skypename"), "html", null, true));
                echo \layout::func_from_text("</a>
                        ");
            }
            // line 17
            echo \layout::func_from_text("                    </div>
                    <div>");
            // line 18
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone")) {
                echo \layout::func_from_text("<span style=\"font-weight: bold;\">М. тел:</span> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "mphone"), "html", null, true));
                echo \layout::func_from_text("
                        ");
            }
            // line 20
            echo \layout::func_from_text("                    </div>
                    ");
            // line 21
            if ($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action")) {
                // line 22
                echo \layout::func_from_text("                        ");
                if ((twig_date_format_filter($this->env, "", "d.m.Y") == twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "d.m.Y"))) {
                    echo \layout::func_from_text("<span style=\"color:red\">сегодня</span> в ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "H:i"), "html", null, true));
                    echo \layout::func_from_text("
                        ");
                } else {
                    // line 24
                    echo \layout::func_from_text("                            ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
                    echo \layout::func_from_text("
                        ");
                }
                // line 26
                echo \layout::func_from_text("                    ");
            }
            // line 27
            echo \layout::func_from_text("                </small>
            </div>
        </div>
        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo \layout::func_from_text("    </div>
</div>
");
        // line 33
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/users/layouts/users_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 33,  122 => 31,  113 => 27,  110 => 26,  104 => 24,  96 => 22,  94 => 21,  84 => 18,  81 => 17,  72 => 15,  63 => 13,  34 => 8,  30 => 6,  26 => 5,  21 => 2,  19 => 1,  102 => 37,  98 => 31,  95 => 30,  91 => 20,  88 => 16,  83 => 4,  78 => 40,  76 => 39,  73 => 38,  71 => 37,  68 => 36,  66 => 35,  61 => 32,  59 => 12,  45 => 10,  43 => 16,  28 => 4,  23 => 1,);
    }
}
