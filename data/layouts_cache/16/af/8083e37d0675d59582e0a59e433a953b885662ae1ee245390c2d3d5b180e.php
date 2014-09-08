<?php

/* applications/projects/layouts/tasks/comment.html */
class __TwigTemplate_16af8083e37d0675d59582e0a59e433a953b885662ae1ee245390c2d3d5b180e extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"comment_box ");
        if (($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id") > 0)) {
            echo \layout::func_from_text("reply_comment");
        }
        echo \layout::func_from_text("\">
<div class=\"comment ");
        // line 2
        if (($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"))) {
            echo \layout::func_from_text("own");
        }
        echo \layout::func_from_text(" ");
        if ((!$this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id"))) {
            echo \layout::func_from_text("root");
        }
        echo \layout::func_from_text("\" id=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\"> 
    <div class=\"folding-dot-holder\">
        <div class=\"folding-dot\"></div>
    </div>    
    <a name=\"comment_");
        // line 6
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\"></a>
    <table class=\"comment_tbl\">
        <tr>
            <td class=\"comm_ava_td\"><a class=\"a_comm_ava\" href=\"/users/~");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\"><img class=\"comm_ava\" ");
        if (((!$this->getAttribute((isset($context["com"]) ? $context["com"] : null), "avatar")) || ($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "avatar") == ""))) {
            echo \layout::func_from_text("src=\"/source/images/no-ava-comment.jpg\"");
        } else {
            echo \layout::func_from_text("src=\"/uploads/users/ava_comment/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "avatar")), "html", null, true));
            echo \layout::func_from_text("\"");
        }
        echo \layout::func_from_text("></a></td>
            <td class=\"comm_td\">
                <div class=\"comment_head\">
                    ");
        // line 12
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id_user"))) {
            // line 13
            echo \layout::func_from_text("                    <span class=\"user_name\">я</span>
                    ");
        } else {
            // line 15
            echo \layout::func_from_text("                    <a href=\"/users/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "group_color"), "html", null, true));
            echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</a>
                    ");
        }
        // line 17
        echo \layout::func_from_text("                    <span class=\"commdate\">
                        ");
        // line 18
        if ((twig_date_format_filter($this->env, "", "d.m.Y") == twig_date_format_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "created"), "d.m.Y"))) {
            // line 19
            echo \layout::func_from_text("                            сегодня ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "created"), "H:i"), "html", null, true));
            echo \layout::func_from_text("
                        ");
        } else {
            // line 21
            echo \layout::func_from_text("                            ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "created"), "d.m.Y H:i"), "html", null, true));
            echo \layout::func_from_text("
                        ");
        }
        // line 23
        echo \layout::func_from_text("                    </span>
                    <a href=\"#comment_");
        // line 24
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">#</a>
                    ");
        // line 25
        if (($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id") > 0)) {
            echo \layout::func_from_text("<a href=\"#comment_");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id"), "html", null, true));
            echo \layout::func_from_text("\" parent=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id"), "html", null, true));
            echo \layout::func_from_text("\">↑</a>");
        }
        // line 26
        echo \layout::func_from_text("                    ");
        if (($this->getAttribute($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "subscribe"), "last_visit") && ($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "created") > $this->getAttribute($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "subscribe"), "last_visit")))) {
            echo \layout::func_from_text("<span style=\"color:blue;\">новый!</span>");
        }
        // line 27
        echo \layout::func_from_text("
                    ");
        // line 28
        if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "status") != "closed")) {
            echo \layout::func_from_text("<div style=\"float:right;\"><a href=\"\" class=\"comment_to_comment\" to_comment=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">ответить</a></div>");
        }
        // line 29
        echo \layout::func_from_text("                    ");
        if (($this->getAttribute((isset($context["access_article"]) ? $context["access_article"] : null), "comment") && $this->getAttribute((isset($context["access_article"]) ? $context["access_article"] : null), "delete_comment"))) {
            echo \layout::func_from_text("<div style=\"float:right;margin-left: 5px;\">|&nbsp;</div>");
        }
        // line 30
        echo \layout::func_from_text("                    ");
        if ($this->getAttribute((isset($context["access_article"]) ? $context["access_article"] : null), "delete_comment")) {
            echo \layout::func_from_text("<div style=\"float:right;\"><a href=\"\" class=\"del_comment\" del_comment=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">удалить</a></div>");
        }
        // line 31
        echo \layout::func_from_text("                </div>
            </td>
        </tr>
    </table>
        <div>

                <div class=\"comment_body\">");
        // line 37
        echo \layout::func_from_text($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "text"));
        echo \layout::func_from_text("</div>

        </div>
</div>

");
        // line 42
        if ($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "category")) {
            // line 43
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "category"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["com"]) {
                // line 44
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/comment.html"), "method"));
                $template->display($context);
                // line 45
                echo \layout::func_from_text("    ");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['com'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 47
        echo \layout::func_from_text("
</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/comment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 47,  177 => 45,  173 => 44,  155 => 43,  153 => 42,  145 => 37,  137 => 31,  130 => 30,  125 => 29,  119 => 28,  116 => 27,  111 => 26,  103 => 25,  99 => 24,  96 => 23,  90 => 21,  84 => 19,  82 => 18,  79 => 17,  67 => 15,  63 => 13,  61 => 12,  47 => 9,  41 => 6,  26 => 2,  19 => 1,);
    }
}
