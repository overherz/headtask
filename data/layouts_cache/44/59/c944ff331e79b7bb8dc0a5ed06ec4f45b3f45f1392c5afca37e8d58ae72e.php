<?php

/* applications\pages\layouts\admin/form.html */
class __TwigTemplate_4459c944ff331e79b7bb8dc0a5ed06ec4f45b3f45f1392c5afca37e8d58ae72e extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"add_html\">
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
            <div class=\"body\"><span class=\"title\">Url</span>
                <div><input type=\"text\" name=\"url\" value=\"");
        // line 30
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div>
                <div class=\"description\">допускаются английские буквы, цифры и знаки \"-\", \"_\"</div>
                <div class=\"description\">знанение \"index\" сделает страницу главной</div>
            </div>
            <div class=\"body\"><span class=\"title\">Шаблон</span>
                <div>
                    <select name=\"template\">
                        ");
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["templates"]) ? $context["templates"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 38
            echo \layout::func_from_text("                            <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "template") == (isset($context["t"]) ? $context["t"] : null))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
            echo \layout::func_from_text("</option>
                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo \layout::func_from_text("                    </select>
                </div>
            </div>
            <div class=\"body\"><span class=\"title\">Title</span>
                <div><input type=\"text\" name=\"title\" value=\"");
        // line 44
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Keywords</span>
                <div><input type=\"text\" name=\"keywords\" value=\"");
        // line 46
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
            <div class=\"body\"><span class=\"title\">Description</span>
                <div><textarea name=\"description\" class=\"input\" style=\"width:350px;height:100px;\">");
        // line 48
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
        </div>
        <div id=\"tabs-2\">
            <div class=\"body\">
                <div><textarea name=\"text\" class=\"input\">");
        // line 52
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "text"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
        </div>
    </div>
</form>
</div>");
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 52,  181 => 48,  176 => 46,  171 => 44,  165 => 40,  150 => 38,  146 => 37,  136 => 30,  131 => 28,  125 => 24,  111 => 23,  108 => 22,  94 => 21,  90 => 20,  73 => 19,  62 => 18,  59 => 17,  42 => 16,  27 => 4,  23 => 3,  19 => 1,);
    }
}
