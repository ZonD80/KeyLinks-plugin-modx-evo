<?php
$_KL_BASE = 'assets/plugins/keylinks/';

$e = &$modx->Event;
switch ($e->name) {
	case "OnWebPagePrerender":
	$exclude_docs = explode(',',$exclude_docs);
	
	$documents = $modx->getActiveChildren();
	
	foreach ($documents as $doc_data) {
		if (!in_array($doc_data['id'],$exclude_docs)) {
			$TV_data = $modx->getTemplateVar($TV,"*",$doc_data['id']);
			$replacements[$doc_data['id']]['words'] = explode($separator,$TV_data['value']);
			$replacements[$doc_data['id']]['title'] = $doc_data['pagetitle'];
			
		}
	}
	
	if ($replacements) {
		
		$o = &$modx->documentOutput; // get a reference of the output
		
		require(MODX_BASE_PATH. $_KL_BASE .'qp/qp.php');
		
		$document = @qp($o, '', array('ignore_parser_warnings' => TRUE));
		$replaceable_data = $document->find("body ".$include_tags);
		foreach ($replaceable_data as $element) {
			foreach ($replacements as $did=>$replace_data) {
				foreach ($replace_data['words'] as $word) {
					$replacement = "<a href=\"{$modx->makeUrl($did)}\" title=\"{$replace_data['title']}\" class=\"$class\">$0</a>";
					$element->html(preg_replace('~(?!title=".*?)\b('.$word.')\b(?!.*?")~'.($case_sensitive?'i':''),$replacement,$element->html()));
				}
			}
		}
		
		
		$o = $document->innerHTML();
		
		
	}
	break;
	default :
	return;
	break;
}