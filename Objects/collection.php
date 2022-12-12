<?php
#REVISION HISTORY SECTION starts
#DEVELOPER2134668             DATE(yr/mm/day/                 COMMENTS
#dec12th2022--adding code teacher explain on dec9th2022 week general record meeting

class collection
//main opens
{
    
    
    public $items = array();
    
    public function add($primary_key, $item)
    {
        $this->items[$primary_key] = $item;
    }
    
    public function remove($primary_key)
    {
        if(isset($this->items[$primary_key]))
        {
            unset($this->items[$primary_key] );
        }
        
    }
    
    public function get($primary_key)
    {
        if(isset($this->items[$primary_key]))
        {
            return ($this->items[$primary_key] );
        }
    }
    
    public function count()
    {
        return count($this->items);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//main closes   
}

