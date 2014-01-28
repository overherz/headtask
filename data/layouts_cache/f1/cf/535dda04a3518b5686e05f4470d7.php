<?php

/* applications\projects\layouts\user_tasks.html */
class __TwigTemplate_f1cf535dda04a3518b5686e05f4470d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Отчет по задачам
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    <script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
    <script type=\"text/javascript\" src=\"/source/js/search.js\"></script>
    <script type=\"text/javascript\" src=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "user_tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 13
    public function block_context($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("    ");
        $context["inputs"] = $this->env->loadTemplate("/source/search_macro.html");
        // line 15
        echo \layout::func_from_text("    <form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin-bottom:0px;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
        <table class=\"table table-condensed table-bordered\" style=\"width: 1px;display: block;\" id=\"filter_table\">
            <tr>
                <th>Пользователь</th>
                <th>Дата</th>
                <th>Статус задачи</th>
                <th>Приоритет задачи</th>
                <th>Тип задачи</th>
                <th>Другое</th>
            </tr>
            <tr>
                <td>
                    <select name=\"id_user\">
                        <option>&nbsp;</option>
                        ");
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 31
            echo \layout::func_from_text("                            <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["u"]) ? $context["u"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</option>
                        ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo \layout::func_from_text("                    </select>
                </td>
                <td>Начало: <input type=\"text\" name=\"start\" value=\"");
        // line 35
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly>
                    Окончание: <input type=\"text\" name=\"end\" value=\"");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly></td>
                <td>");
        // line 37
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
        echo \layout::func_from_text("</td>
                <td>");
        // line 38
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
        echo \layout::func_from_text("</td>
                <td>");
        // line 39
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "type"), "type"));
        echo \layout::func_from_text("</td>
                <td>
                    <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                    ");
        // line 42
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
        echo \layout::func_from_text("
                </td>
            </tr>
        </table>
    </form>
    <div class=\"clearfix\"></div>
    <div id=\"search_result\"></div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\user_tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 42,  109 => 39,  105 => 38,  101 => 37,  97 => 36,  93 => 35,  89 => 33,  78 => 31,  74 => 30,  57 => 15,  54 => 14,  51 => 13,  45 => 10,  41 => 8,  38 => 7,  33 => 4,  30 => 3,);
    }
}
