<?php

/* applications/logs/layouts/admin/index.html */
class __TwigTemplate_1e4a585eda2e1a7b20ae7d5ec42a6dd8e5ec2b7744b1f4471737cc469a9a4e94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/admin/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'message' => array($this, 'block_message'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/admin/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    &rarr; Логи авторизации
");
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "logs", 1 => "logs.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 8
    public function block_js($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("    ,\"/source/js/search.js\"
    ,\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "logs", 1 => "logs_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 13
    public function block_message($context, array $blocks = array())
    {
        // line 14
        if (((isset($context["type"]) ? $context["type"] : null) == "login")) {
            echo \layout::func_from_text("Показаны логи за последние 3 месяца");
        }
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\">
    Поиск&nbsp;<input type=\"text\" name=\"search\" class=\"input\">
    <input type=\"hidden\" name=\"page\">
    ");
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["f"]) {
            // line 22
            echo \layout::func_from_text("        &nbsp;");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "label"), "html", null, true));
            echo \layout::func_from_text("
        ");
            // line 23
            if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "select")) {
                // line 24
                echo \layout::func_from_text("            &nbsp;<select name=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("\">
            ");
                // line 25
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options"));
                foreach ($context['_seq'] as $context["j"] => $context["o"]) {
                    // line 26
                    echo \layout::func_from_text("                <option value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : null), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "selected") == (isset($context["j"]) ? $context["j"] : null))) {
                        echo \layout::func_from_text("selected");
                    }
                    echo \layout::func_from_text(">");
                    if (((isset($context["o"]) ? $context["o"] : null) != "")) {
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["o"]) ? $context["o"] : null), "html", null, true));
                    } else {
                        echo \layout::func_from_text("&nbsp;");
                    }
                    echo \layout::func_from_text("</option>
            ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['j'], $context['o'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 28
                echo \layout::func_from_text("        </select>
        ");
            }
            // line 30
            echo \layout::func_from_text("    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo \layout::func_from_text("
    <div id=\"search_result\">");
        // line 32
        $this->env->loadTemplate("/applications/logs/layouts/admin/table.html")->display($context);
        echo \layout::func_from_text("</div>

");
    }

    public function getTemplateName()
    {
        return "applications/logs/layouts/admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 32,  128 => 31,  122 => 30,  118 => 28,  99 => 26,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 18,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 5,  35 => 3,  32 => 2,);
    }
}
