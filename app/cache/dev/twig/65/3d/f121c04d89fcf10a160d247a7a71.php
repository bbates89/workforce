<?php

/* AffinityAppBundle:Default:index.html.twig */
class __TwigTemplate_653df121c04d89fcf10a160d247a7a71 extends Twig_Template
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
        echo "Welcome to the index page.  You are logged in.

<br />
<br />

<a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("logout"), "html", null, true);
        echo "\">Logout</a>";
    }

    public function getTemplateName()
    {
        return "AffinityAppBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 6,  17 => 1,);
    }
}
