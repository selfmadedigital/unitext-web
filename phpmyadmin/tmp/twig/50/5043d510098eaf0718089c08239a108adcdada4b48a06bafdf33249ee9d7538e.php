<?php

/* export/alias_item.twig */
class __TwigTemplate_fed45ed29c23830cc04b9ea571163e1dc58c8c9cfe4d022d60dd289be2c0b432 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<tr>
    <th>";
        // line 2
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "</th>
    <td>";
        // line 3
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</td>
    <td>
        <input name=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["field"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\" type=\"text\" />
    </td>
    <td>
        <button class=\"alias_remove ui-button ui-corner-all ui-widget\">";
        // line 8
        echo _gettext("Remove");
        echo "</button>
    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "export/alias_item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  31 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "export/alias_item.twig", "/home/unitext/public_html/phpmyadmin/templates/export/alias_item.twig");
    }
}
