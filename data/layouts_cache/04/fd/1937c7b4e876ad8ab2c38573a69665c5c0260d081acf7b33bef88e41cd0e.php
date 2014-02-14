<?php

/* /applications/pages/layouts/admin/form.html */
class __TwigTemplate_04fd1937c7b4e876ad8ab2c38573a69665c5c0260d081acf7b33bef88e41cd0e extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"add_html\" ");
        if ((!(isset($context["show"]) ? $context["show"] : null))) {
            echo \layout::func_from_text("style=\"display: none;\"");
        }
        echo \layout::func_from_text(">
<form class=\"new_page\">
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"id_text\" value=\"");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id_text"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save\">
    <div id=\"tabs\">
        <ul>
            <li><a href=\"#tabs-1\">Описание</a></li>
            <li><a href=\"#tabs-2\">Текст</a></li>
        </ul>
        <div id=\"tabs-1\">
            <div class=\"body\"><span class=\"title\">Родительская страница</span>
                <div>
                    <select name=\"parent_id\">
                        <option>&nbsp;</option>
                        ");
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pages_cat"]) ? $context["pages_cat"] : null));
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
            // line 17
            echo \layout::func_from_text("                            ");
            if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id") != $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"))) {
                // line 18
                echo \layout::func_from_text("                                <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id") == $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "parent_id"))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                echo \layout::func_from_text(twig_escape_filter($this->env, cut($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), 40), "html", null, true));
                echo \layout::func_from_text("</option>
                                ");
                // line 19
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "sub"));
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
                    // line 20
                    echo \layout::func_from_text("                                    ");
                    $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "pages", 1 => "admin/nested_option.html"), "method"));
                    $template->display($context);
                    // line 21
                    echo \layout::func_from_text("                                ");
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
                // line 22
                echo \layout::func_from_text("                            ");
            }
            // line 23
            echo \layout::func_from_text("                        ");
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
        // line 24
        echo \layout::func_from_text("                    </select>
                </div>
            </div>
            <div class=\"body\"><span class=\"title\">Название</span>
                <div><input type=\"text\" name=\"name\" value=\"");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Английское название (url)</span>
                <div><input type=\"text\" name=\"url\" value=\"");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Title</span>
                <div><input type=\"text\" name=\"title\" value=\"");
        // line 32
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Keywords</span>
                <div><input type=\"text\" name=\"keywords\" value=\"");
        // line 34
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Description</span>
                <div><textarea name=\"description\" class=\"input\" style=\"width:350px;height:100px;\">");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
        </div>
        <div id=\"tabs-2\">
            <div class=\"body\">
                <div><textarea name=\"text\" class=\"input\">");
        // line 40
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
        </div>
    </div>
</form>
</div>");
    }

    public function getTemplateName()
    {
        return "/applications/pages/layouts/admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 40,  155 => 36,  150 => 34,  145 => 32,  140 => 30,  135 => 28,  129 => 24,  115 => 23,  112 => 22,  98 => 21,  94 => 20,  77 => 19,  66 => 18,  63 => 17,  46 => 16,  31 => 4,  27 => 3,  19 => 1,);
    }
}
