<?php

/* applications/projects/layouts/forum/show_topic.html */
class __TwigTemplate_b82e2f8ab8773812cb0748490fa30d5c644a7e8aa776248346344e6c1f146717 extends Twig_Template
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
            echo \layout::func_from_text("    <i class=\"fa fa-lock\" style=\"float: left;font-size: 40px;margin-right: 10px;\" title=\"Закрытая тема\"></i>
");
        }
        // line 24
        if ($this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "fixed")) {
            // line 25
            echo \layout::func_from_text("    <i class=\"fa-thumb-tack \" style=\"float: left;font-size: 40px;\" title=\"Закрепленная тема\"></i>
");
        }
        // line 27
        echo \layout::func_from_text("<table class=\"table table_style no_padding_right no_padding_left\" id=\"posts_table\">
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
            echo \layout::func_from_text("    ");
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 2) == 0)) {
                $context["color"] = "#f7f7f7";
            } else {
                $context["color"] = "#fff";
            }
            // line 30
            echo \layout::func_from_text("    <thead>
    <tr>
        <th class=\"forum_fio\" colspan=\"2\" style=\"text-align: left !important;background: ");
            // line 32
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
            echo \layout::func_from_text(" !important;\">
            <span class=\"get_ms_status user_offline\" data-id=\"");
            // line 33
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author"), "html", null, true));
            echo \layout::func_from_text("\" style=\"font-size: 14px;\"></span>
            <a href=\"/users/~");
            // line 34
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";\"><b>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</b></a>
            <div style=\"float: right;\">");
            // line 35
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
            echo \layout::func_from_text("</div>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style=\"text-align: center;vertical-align: top !important;border-right: 1px solid #ddd;width: 96px;padding-right: 0 !important;background: ");
            // line 41
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
            echo \layout::func_from_text(" !important;\">
            ");
            // line 42
            if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "avatar")) {
                echo \layout::func_from_text("<img src=\"/uploads/users/ava_small/");
                echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "avatar")), "html", null, true));
                echo \layout::func_from_text("\">");
            } else {
                echo \layout::func_from_text("<img src='/source/images/no-ava-small.jpg' class=\"img-polaroid\">");
            }
            // line 43
            echo \layout::func_from_text("        </td>
        <td class=\"wysiwyg post_td\" style=\"vertical-align: top !important;background: ");
            // line 44
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
            echo \layout::func_from_text(" !important;\">
            <div id=\"post");
            // line 45
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" class=\"post\">");
            echo \layout::func_from_text($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "text"));
            echo \layout::func_from_text("</div>
        </td>
    </tr>
        ");
            // line 48
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last"))) {
                // line 49
                echo \layout::func_from_text("            <tr>
                <td colspan=\"2\" style=\"border:none !important;text-align: right;background: ");
                // line 50
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true));
                echo \layout::func_from_text(" !important;padding-bottom: 10px !important;\">
                    <div class=\"btn-group\">
                        <a href=\"\" class=\"btn btn-oscar btn-xs quote_post\" data-id=\"");
                // line 52
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"><i class=\"fa fa-quote-right fa-fw\"></i></a>
                        ");
                // line 53
                if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum") || ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "author") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
                    // line 54
                    echo \layout::func_from_text("                            <a href=\"\" class=\"btn btn-xs btn-oscar edit_post\" data-id=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"><i class=\"fa fa-pencil fa-fw\"></i></a>
                        ");
                }
                // line 56
                echo \layout::func_from_text("                        ");
                if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum") && ((isset($context["first_post"]) ? $context["first_post"] : null) != $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id")))) {
                    // line 57
                    echo \layout::func_from_text("                            <a href=\"\" class=\"btn btn-xs btn-oscar delete_post\" data-id=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"><i class=\"fa fa-trash-o fa-fw\"></i></a>
                        ");
                }
                // line 59
                echo \layout::func_from_text("                    </div>
                </td>
            </tr>
        ");
            }
            // line 63
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
        // line 64
        echo \layout::func_from_text("    </tbody>
</table>

");
        // line 67
        if ((!$this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "closed"))) {
            // line 68
            echo \layout::func_from_text("<div class=\"clearfix\"></div>
<form class='post_form_bottom' style=\"margin-top: 20px;\">
    <input type=\"hidden\" name=\"id_topic\" value=\"");
            // line 70
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["topic"]) ? $context["topic"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save_post\">
    <div class=\"wysiwyg\"><textarea name='text_bottom'></textarea></div>
</form>
    <div style=\"text-align: center;\"><a href=\"\" class=\"btn btn-oscar save_post_bottom\" style=\"margin-top: 20px;\">Отправить</a></div>
");
        }
        // line 76
        $this->env->loadTemplate("/source/paginator.html")->display($context);
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/forum/show_topic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 76,  245 => 70,  241 => 68,  239 => 67,  234 => 64,  220 => 63,  214 => 59,  208 => 57,  205 => 56,  199 => 54,  197 => 53,  193 => 52,  188 => 50,  185 => 49,  183 => 48,  175 => 45,  171 => 44,  168 => 43,  160 => 42,  156 => 41,  147 => 35,  139 => 34,  135 => 33,  131 => 32,  127 => 30,  120 => 29,  103 => 28,  100 => 27,  96 => 25,  94 => 24,  90 => 22,  88 => 21,  72 => 20,  69 => 19,  63 => 17,  61 => 16,  59 => 15,  56 => 14,  50 => 11,  46 => 10,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
