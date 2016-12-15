<?php

class Option_paiement extends AppModel{
	
	public $name = 'Option_paiement';
	
	public $useTable = 'option_paiement';
	
	public $primaryKey = 'option_paiement_id';
	
	/**
	 * Définition des liens entre les modèles
	 * http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
	 */
	public $belongsTo = array('Paiement', 'Option');
				
	/**
	 * Définition du comportement du modèle
	 * http://book.cakephp.org/2.0/en/models/behaviors.html
	 */
	//public $actAs;
	
	
	/**
	 * Définition des règles de validation du modèle
	 * http://book.cakephp.org/2.0/en/models/data-validation.html
	 */
	public $validate = array(
				'quantite' => array(
								'natural' => array(
											'rule' => array('naturalNumber', true),
											'message' => "La quantité doit être un nombre entier.",
											),
								),
				);
}

?>