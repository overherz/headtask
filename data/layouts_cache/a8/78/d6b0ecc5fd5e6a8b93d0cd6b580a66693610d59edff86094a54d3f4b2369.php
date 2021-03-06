<?php

/* /applications/users/layouts/users_table.html */
class __TwigTemplate_a878d6b0ecc5fd5e6a8b93d0cd6b580a66693610d59edff86094a54d3f4b2369 extends Twig_Template
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
        echo \layout::func_from_text("<div style=\"margin-right: 15px;\">");
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        echo \layout::func_from_text("</div>

<div class=\"container-fluid\" style=\"padding-right: 0;margin-top: 10px;\">
    <div class=\"row\" style=\"margin-right: 0;\">
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
                echo \layout::func_from_text("/source/images/no-ava-profile");
                if (($this->getAttribute((isset($context["u"]) ? $context["u"] : null), "gender") == "f")) {
                    echo \layout::func_from_text("_f");
                }
                echo \layout::func_from_text(".jpg");
            }
            echo \layout::func_from_text("\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("\"></a>
                </div>
                <small>");
            // line 12
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("
                    <div class=\"get_ms_status user_offline\" data-id=\"");
            // line 13
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
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
<div style=\"margin-right: 15px;\">");
        // line 33
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
        echo \layout::func_from_text("</div>");
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
        return array (  127 => 33,  123 => 31,  114 => 27,  111 => 26,  105 => 24,  97 => 22,  95 => 21,  92 => 20,  85 => 18,  82 => 17,  73 => 15,  68 => 13,  64 => 12,  46 => 10,  35 => 8,  31 => 6,  27 => 5,  19 => 1,);
    }
}
