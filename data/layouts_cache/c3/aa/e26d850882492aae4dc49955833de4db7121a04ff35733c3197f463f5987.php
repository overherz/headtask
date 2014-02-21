<?php

/* /applications/projects/layouts/tasks/comment.html */
class __TwigTemplate_c3aae26d850882492aae4dc49955833de4db7121a04ff35733c3197f463f5987 extends Twig_Template
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
                    <a href=\"/users/~");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_color"), "html", null, true));
        echo \layout::func_from_text("!important;font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "assigned_group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text(" <span class=\"account-nick\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("</span></a>
                    <span class=\"commdate\">");
        // line 13
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "created"), "d.m.Y, H:i:s"), "html", null, true));
        echo \layout::func_from_text("</span>
                    <a href=\"#comment_");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">#</a>
                    ");
        // line 15
        if (($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id") > 0)) {
            echo \layout::func_from_text("<a href=\"#comment_");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id"), "html", null, true));
            echo \layout::func_from_text("\" parent=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "parent_id"), "html", null, true));
            echo \layout::func_from_text("\">↑</a>");
        }
        // line 16
        echo \layout::func_from_text("                    ");
        if (($this->getAttribute($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "subscribe"), "last_visit") && ($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "created") > $this->getAttribute($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "subscribe"), "last_visit")))) {
            echo \layout::func_from_text("<span style=\"color:blue;\">новый!</span>");
        }
        // line 17
        echo \layout::func_from_text("
                    <div style=\"float:right;\"><a href=\"\" class=\"comment_to_comment\" to_comment=\"");
        // line 18
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">ответить</a></div>
                    ");
        // line 19
        if (($this->getAttribute((isset($context["access_article"]) ? $context["access_article"] : null), "comment") && $this->getAttribute((isset($context["access_article"]) ? $context["access_article"] : null), "delete_comment"))) {
            echo \layout::func_from_text("<div style=\"float:right;margin-left: 5px;\">|&nbsp;</div>");
        }
        // line 20
        echo \layout::func_from_text("                    ");
        if ($this->getAttribute((isset($context["access_article"]) ? $context["access_article"] : null), "delete_comment")) {
            echo \layout::func_from_text("<div style=\"float:right;\"><a href=\"\" class=\"del_comment\" del_comment=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">удалить</a></div>");
        }
        // line 21
        echo \layout::func_from_text("                </div>
                <div class=\"comment_body\">");
        // line 22
        echo \layout::func_from_text(nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["com"]) ? $context["com"] : null), "text"), "html", null, true)));
        echo \layout::func_from_text("</div>
            </td>
        </tr>
    </table>
</div>

");
        // line 28
        if ($this->getAttribute((isset($context["com"]) ? $context["com"] : null), "category")) {
            // line 29
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
                // line 30
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/comment.html"), "method"));
                $template->display($context);
                // line 31
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
        // line 33
        echo \layout::func_from_text("
</div>
");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/tasks/comment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 33,  148 => 31,  144 => 30,  126 => 29,  124 => 28,  115 => 22,  112 => 21,  105 => 20,  101 => 19,  97 => 18,  94 => 17,  89 => 16,  81 => 15,  77 => 14,  73 => 13,  61 => 12,  47 => 9,  41 => 6,  26 => 2,  19 => 1,);
    }
}
