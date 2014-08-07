<?php

/* AltSTUVizBundle:Viz:d3-line.html.twig */
class __TwigTemplate_7141ed54953325348ce392fb7f987f92407f61ad178aed0a5068d01acf463a4f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<meta charset=\"utf-8\">
<style>

body {
  font: 10px sans-serif;
}

svg {
    display: block;
    width: 100%;
    height: 100%;
}

svg .data-point {
    stroke: blue;
    stroke-width: 1.5px;
    fill: blue;        
}

svg .data-point-text {
    font-family: sans-serif;
    font-size: 11px;
    fill: red;
}

svg .axis path, 
svg .axis line {
    fill: none;
    stroke: black;
}

svg .axis text {
    font-family: sans-serif;
    font-size: 11px;
}
.line {
  fill: none;
  stroke: steelblue;
  stroke-width: 1.5px;
}


</style>
<body>
";
        // line 46
        $this->displayBlock('javascripts', $context, $blocks);
        // line 140
        echo "
";
    }

    // line 46
    public function block_javascripts($context, array $blocks = array())
    {
        // line 47
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/js/d3.v3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script>
var margin = {
            \"top\": 10,
            \"right\": 10,
            \"bottom\": 50,
            \"left\": 50
        },
        width = ";
        // line 55
        echo twig_escape_filter($this->env, (isset($context["w"]) ? $context["w"] : $this->getContext($context, "w")), "html", null, true);
        echo ",
        height = ";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["h"]) ? $context["h"] : $this->getContext($context, "h")), "html", null, true);
        echo ";


// get the data
    var data = ";
        // line 60
        echo twig_jsonencode_filter((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        echo ";

    var color = d3.scale.";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : $this->getContext($context, "color")), "html", null, true);
        echo "();

// Define the padding around the graph
    var padding = 10;

// Set the scales
    var x = d3.scale.ordinal()
        .domain(data.map(function(d) {
            return d.labels;}))
        //.rangeRoundBands([0, width], 0);
        .rangePoints([0, width], 0.7);

    var y = d3.scale.linear()
        .domain([0, d3.max(data, function(d) { return d.values; })])
        .range([height, 0]);

    var xAxis = d3.svg.axis().scale(x).orient(\"bottom\");
    var yAxis = d3.svg.axis().scale(y).orient(\"left\");

 // draw line graph
    var line = d3.svg.line()
        .x(function(d) { return x(d.labels); })
        .y(function(d) { return y(d.values); })
        .interpolate(\"linear\");
        
// Create the SVG 'canvas'
    var svg = d3.select(\"body\").append(\"svg\")
            .attr(\"class\", \"chart\")
            .attr(\"width\", width + margin.left + margin.right)
            .attr(\"height\", height + margin.top + margin.bottom).append(\"g\")
            .attr(\"transform\", \"translate(\" + margin.left + \",\" + margin.right + \")\");
    
    svg.append(\"g\")
      .attr(\"class\", \"x axis\")
      .attr(\"transform\", \"translate(0,\" + height + \")\")
      .call(xAxis)
    .selectAll(\".tick text\")
      .call(wrap, x.rangeBand());

    svg.append(\"g\")
      .attr(\"class\", \"y axis\")
      .call(yAxis);
      
    svg.append(\"path\")
      .attr(\"d\",line(data))
      .attr(\"stroke\", color)
      .attr(\"stroke-width\", 2)
      .attr(\"fill\", \"none\");

        function wrap(text, width) 
        {
          //  alert('wrap!');
          text.each(function() 
          {
            var text = d3.select(this),
                words = text.text().split(/\\s+/).reverse(),
                word,
                line = [],
                lineNumber = 0,
                lineHeight = 1.1, // ems
                y = text.attr(\"y\"),
                dy = parseFloat(text.attr(\"dy\")),
                tspan = text.text(null).append(\"tspan\").attr(\"x\", 0).attr(\"y\", y).attr(\"dy\", dy + \"em\");
            while (word = words.pop()) {
              line.push(word);
              tspan.text(line.join(\" \"));
              if (tspan.node().getComputedTextLength() > width) {
                line.pop();
                tspan.text(line.join(\" \"));
                line = [word];
                tspan = text.append(\"tspan\").attr(\"x\", 0).attr(\"y\", y).attr(\"dy\", ++lineNumber * lineHeight + dy + \"em\").text(word);
              }
            }
          });
      }

</script>
";
    }

    public function getTemplateName()
    {
        return "AltSTUVizBundle:Viz:d3-line.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 47,  100 => 60,  34 => 57,  20 => 1,  76 => 34,  65 => 21,  81 => 30,  58 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 28,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 46,  63 => 15,  59 => 18,  38 => 6,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 62,  91 => 27,  62 => 23,  49 => 19,  28 => 3,  26 => 5,  87 => 25,  21 => 2,  31 => 8,  25 => 5,  94 => 28,  89 => 55,  85 => 25,  75 => 17,  68 => 27,  56 => 9,  24 => 4,  19 => 1,  93 => 56,  88 => 6,  78 => 21,  46 => 7,  44 => 11,  27 => 7,  79 => 18,  72 => 25,  69 => 140,  47 => 12,  40 => 10,  37 => 9,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 46,  66 => 24,  55 => 17,  52 => 21,  50 => 15,  43 => 12,  41 => 5,  35 => 9,  32 => 11,  29 => 6,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 53,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 32,  80 => 19,  73 => 19,  64 => 26,  60 => 16,  57 => 11,  54 => 10,  51 => 13,  48 => 22,  45 => 17,  42 => 7,  39 => 10,  36 => 5,  33 => 10,  30 => 7,);
    }
}
