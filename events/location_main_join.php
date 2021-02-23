<?php 

$this->event->listen(['location', 'view', 'output', 'main', 'main_join_2'], function($event){

  switch($this->uri->segment(4)){
    case 'view':
      break;
    default:  
     $event['output'] .= $this->extension['nova_ext_honeypot']->inline_css('custom', 'main', $event['data']);
      $event['output'] .= $this->extension['nova_ext_honeypot']->inline_js('custom', 'main', $event['data']);
    $this->config->load('extensions');
                $event['output'] .= $this->extension['jquery']['generator']
                      ->select('[name="instant_message"]')->closest('p')
                      ->before(
                        $this->extension['nova_ext_honeypot']
                             ->view('form', $this->skin, 'main', $event['data'])
                      );
      
 }
});
