<?php

/* applications\projects\layouts\forum/show_topic.html */
class __TwigTemplate_fe719aab7beae6b6814c9632f950a894e5ae29b209226e0ff50ec7eefcdd4ad1 extends Twig_Template
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
        echo \layout::func_from_text("Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"/source/js/ckeditor/ckeditor.js\"></script>
<script type =\"text/javascript\" src=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 14
    public function block_project_data($context, array $blocks = array())
    {
        // line 15
        $this->env->loadTemplate("/source/paginator.html")->display($context);
        // line 16
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            // line 17
            echo \layout::func_from_text("<a href=\"/projects/forum/edit_topic/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\" class=\"btn btn-oscar\" style=\"float: right;margin-bottom: 10px;margin-top: 10px;margin-left: 10px;\">Редактировать</a>
");
        }
        // line 19
        echo \layout::func_from_text("
<a href=\"\" class=\"btn btn-oscar ");
        // line 20
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "subscribe")) {
            echo \layout::func_from_text("unsubscribe");
        } else {
            echo \layout::func_from_text("subscribe");
        }
        echo \layout::func_from_text("\" data-id=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\" style=\"float: right;margin-bottom: 10px;margin-top: 10px;\">");
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "subscribe")) {
            echo \layout::func_from_text("Отписаться");
        } else {
            echo \layout::func_from_text("Подписаться");
        }
        echo \layout::func_from_text("</a>
");
        // line 21
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "closed")) {
            // line 22
            echo \layout::func_from_text("    <i class=\"icon-lock\" style=\"float: left;font-size: 40px;margin-right: 10px;\" title=\"Закрытая тема\"></i>
");
        }
        // line 24
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "fixed")) {
            // line 25
            echo \layout::func_from_text("    <i class=\"icon-pushpin\" style=\"float: left;font-size: 40px;\" title=\"Закрепленная тема\"></i>
");
        }
        // line 27
        echo \layout::func_from_text("<table class=\"table table-bordered\" id=\"posts_table\">
    ");
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 29
            echo \layout::func_from_text("    <tr>
        <td class=\"forum_fio\">
            <a href=\"/users/~");
            // line 31
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author"), "html", null, true));
            echo \layout::func_from_text("/\"><b>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</b></a>
        </td>
        <td class=\"forum_post_date\">
            ");
            // line 34
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
            echo \layout::func_from_text("
        </td>
    </tr>
    <tr>
        <td style=\"text-align: center;vertical-align: top !important;\">
            ");
            // line 39
            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "avatar")) {
                echo \layout::func_from_text("<img src=\"/uploads/users/ava_small/");
                echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "avatar")), "html", null, true));
                echo \layout::func_from_text("\" class=\"img-polaroid\">");
            } else {
                echo \layout::func_from_text("<img src='/source/images/no-ava-small.jpg' class=\"img-polaroid\">");
            }
            // line 40
            echo \layout::func_from_text("            <div class=\"nickname\" style=\"margin-top: 3px;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "nickname"), "html", null, true));
            echo \layout::func_from_text("</div>
            <div class=\"nickname\" style=\"color:");
            // line 41
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";font-weight: bold;\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("</div>
            ");
            // line 42
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "last_user_action") >= $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "time"))) {
                // line 43
                echo \layout::func_from_text("                <div class=\"user_online\"></div>
            ");
            } else {
                // line 45
                echo \layout::func_from_text("                <div class=\"user_offline\"></div>
            ");
            }
            // line 47
            echo \layout::func_from_text("        </td>
        <td class=\"wysiwyg post_td\" style=\"vertical-align: top !important;\">
            <div id=\"post");
            // line 49
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" class=\"post\">");
            echo \layout::func_from_text($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "text"));
            echo \layout::func_from_text("</div>
        </td>
    </tr>
    <tr>
        <td class=\"forum_post_footer\" colspan=\"2\">
            <a href=\"\" class=\"btn btn-oscar btn-mini quote_post\" data-id=\"");
            // line 54
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"icon-quote-right\"></i></a>
            <div class=\"forum_post_action\">
                <div class=\"btn-group\">
                    ");
            // line 57
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum") || ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                // line 58
                echo \layout::func_from_text("                        <a href=\"\" class=\"btn btn-oscar btn-mini edit_post\" data-id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"icon-pencil icon-white\"></i></a>
                    ");
            }
            // line 60
            echo \layout::func_from_text("                    ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum") && ((isset($context["first_post"]) ? $context["first_post"] : null) != $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")))) {
                // line 61
                echo \layout::func_from_text("                        <a href=\"\" class=\"btn btn-oscar btn-mini delete_post\" data-id=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"icon-trash icon-white\"></i></a>
                    ");
            }
            // line 63
            echo \layout::func_from_text("                </div>
            </div>
        </td>
    </tr>
    ");
            // line 67
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                // line 68
                echo \layout::func_from_text("    <tr>
        <td colspan=\"3\" style=\"background: #e2e2e2;padding: 5px;\"></td>
    </tr>
    ");
            }
            // line 72
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo \layout::func_from_text("</table>

");
        // line 75
        if ((!$this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "closed"))) {
            // line 76
            echo \layout::func_from_text("<div class=\"clearfix\"></div>
<form class='post_form_bottom' style=\"margin-top: 20px;\">
    <input type=\"hidden\" name=\"id_topic\" value=\"");
            // line 78
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save_post\">
    <div class=\"wysiwyg\"><textarea name='text_bottom'></textarea></div>
</form>
    <div style=\"text-align: center;\"><a href=\"\" class=\"btn btn-oscar save_post_bottom\" style=\"margin-top: 20px;\">Отправить</a></div>
");
        }
        // line 84
        $this->env->loadTemplate("/source/paginator.html")->display($context);
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\forum/show_topic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 84,  244 => 78,  240 => 76,  238 => 75,  234 => 73,  220 => 72,  214 => 68,  212 => 67,  206 => 63,  200 => 61,  197 => 60,  191 => 58,  189 => 57,  183 => 54,  173 => 49,  169 => 47,  165 => 45,  161 => 43,  159 => 42,  153 => 41,  148 => 40,  140 => 39,  132 => 34,  124 => 31,  120 => 29,  103 => 28,  100 => 27,  96 => 25,  94 => 24,  90 => 22,  88 => 21,  72 => 20,  69 => 19,  63 => 17,  61 => 16,  59 => 15,  56 => 14,  50 => 11,  46 => 10,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
