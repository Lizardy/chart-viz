<?php

namespace AltSTU\PollBundle;

use AltSTU\VizBundle\Services\VizService;
use AltSTU\VizBundle\Services\VizPdfService;

class AltSTUPollCustomization
{
    protected $dataCollectionName;
    protected $dataTypeName;
    protected $formatName;
    protected $typeDiagramName;
    protected $width;
    protected $height;
    protected $pdfFormat;
    protected $colorSchemeName;
    protected $fontName;
    protected $tx;
    protected $ty;

    public function getDataCollectionName()
    {return $this->dataCollectionName;}
    
    public function setDataCollectionName($param)
    {$this->dataCollectionName = $param;}
    
    public function getDataTypeName()
    {return $this->dataTypeName;}
    
    public function setDataTypeName($param)
    {$this->dataTypeName = $param;}
    
    public function getFormatName()
    {return $this->formatName;}
    
    public function setFormatName($param)
    {$this->formatName = $param;}
    
    public function getTypeDiagramName()
    {return $this->typeDiagramName;}
    
    public function setTypeDiagramName($param)
    {$this->typeDiagramName = $param;}
    
    public function getWidth()
    {return $this->width;}
    
    public function setWidth($param)
    {$this->width = $param;}
    
    public function getHeight()
    {return $this->height;}
    
    public function setHeight($param)
    {$this->height = $param;}
    
    public function getPdfFormat()
    {return $this->pdfFormat;}
    
    public function setPdfFormat($param)
    {$this->pdfFormat = $param;}
    
    public function getColorSchemeName()
    {return $this->colorSchemeName;}
    
    public function setColorSchemeName($param)
    {$this->colorSchemeName = $param;}
    
    public function getFontName()
    {return $this->fontName;}
    
    public function setFontName($param)
    {$this->fontName = $param;}
    
    public function getTx()
    {return $this->tx;}
    
    public function setTx($param)
    {$this->tx = $param;}
    
    public function getTy()
    {return $this->ty;}
    
    public function setTy($param)
    {$this->ty = $param;}

}
