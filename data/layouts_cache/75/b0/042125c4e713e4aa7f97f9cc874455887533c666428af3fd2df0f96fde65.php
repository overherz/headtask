<?php

/* applications\projects\layouts\tasks/forward_task.html */
class __TwigTemplate_75b0042125c4e713e4aa7f97f9cc874455887533c666428af3fd2df0f96fde65 extends Twig_Template
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
        echo \layout::func_from_text("<form style=\"width: 500px;\" id=\"percent_form\">
<b>Статус выполнения</b>
<div id=\"task_percent\"></div>
<input type=\"hidden\" name=\"act\" value=\"forward_task\">
<input type=\"hidden\" name=\"id\" value=\"");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
<input type=\"hidden\" id=\"current_percent\" name=\"current_percent\" value=\"");
        // line 6
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("\">
<input type=\"hidden\" id=\"new_current_percent\" name=\"new_current_percent\" value=\"");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("\">
<input type=\"hidden\" id=\"spent_time\" name=\"spent_time\" value=\"0\">
<input type=\"hidden\" id=\"time1_val\" name=\"time1\" value=\"0\">
<input type=\"hidden\" id=\"time2_val\" name=\"time2\" value=\"0\">


<div style=\"margin-top: 10px;\">
    <div>Текущий: <b>");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("</b> %</div>
    <div>Выбранный: <b><span id=\"new_percent\">");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "percent"), "html", null, true));
        echo \layout::func_from_text("</span></b> %</div>
</div>

<div style=\"height: 30px;\">
    <div id=\"percent_close\" style=\"color: red;display: none;\">Задача будет закрыта</div>
</div>

<div style=\"margin-top: 10px;\"><b>Затраченное время</b></div>
<div id=\"time1\"></div>
<div id=\"time2\" style=\"margin-top: 15px;\"></div>

<div style=\"margin-top: 10px;\">
    <div>Текущее: <b>");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "spent_time"), "html", null, true));
        echo \layout::func_from_text("</b> ч</div>
    <div>Выбранное: <b>+ <span id=\"new_time\">0</span></b> ч.</div>
</div>

<div style=\"margin-top: 10px;\">
    Послать уведомление&nbsp;&nbsp;
    <input type=\"checkbox\" name=\"email\" checked> по email&nbsp;&nbsp;
    ");
        // line 34
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "send_sms"), "value") == 1)) {
            echo \layout::func_from_text("<input type=\"checkbox\" name=\"sms\"> по смс");
        }
        // line 35
        echo \layout::func_from_text("</div>
</form>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\tasks/forward_task.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 35,  72 => 34,  62 => 27,  47 => 15,  43 => 14,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
