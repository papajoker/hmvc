<?php 

/**
 * exemple class for Hmvc
 * view /view/rss.blade.php : exemple blade for this class
 */
class RssController extends Controller {
    protected $url;
    protected $max;
    
    
    public function index($attr)
    {
        $this->url= $attr['url'];
        $this->max= $attr['max'];
      
        return \View::make('rss',
                    array(
                        'messages' => $this->load(),
                        'max' => $this->max,
                        'i' => 0
                    )
                );
    }
    
    protected function load()
    {
        $xml= \File::getRemote($this->url);
        $xml = simplexml_load_string($xml);
        return $xml->channel->item;
    }
    
}
