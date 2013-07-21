<?php
/**
 * imva_oxarticle_yousave
 * oxarticle extension
 *    
 *    
 *    
 * For redistribution in the provicer's network only.
 *
 * Weitergabe außerhalb des Anbieternetzwerkes verboten.
 * 
 *
 *
 * This software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is provided "as it is" with no guarantee.
 *
 * You are free to use this software and to modify it in order to fit your requirements.
 * 
 * Any modification, copying, redistribution, transmission outsitde of the provider's platforms
 * is a violation of the license agreement and will be prosecuted by civil and criminal law.
 *
 * By applying and using this software product, you agree to the terms and conditions of use.
 * 
 * 
 * 
 * Diese Software ist geistiges Eigentum von imva.biz respektive ihres Autors und ist durch das
 * Urheberrecht geschützt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 * 
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bedürfnisse anzupassen.
 * 
 * Jegliche Modifikation, Vervielfältigung, Redistribution, Übertragung zum Zwecke der
 * Weiterentwicklung außerhalb der Netzwerke des Anbieters ist untersagt und stellt einen Verstoß
 * gegen die Lizenzvereinbarung dar.
 *
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 * 
 * 
 * 
 * (EULA-13/7)
 * 
 * @author ja@imva.biz
 *      
 *    v 0.2
 *    13/6/10
 */

class imva_oxarticle_yousave extends imva_oxarticle_yousave_parent{

	/**
	 * You save...  percent (discounted price vs. regular price)
	 * @return integer
	 */
	public function getSaving()
	{
		$dRegularPrice = $this->getRegularPrice();
		$dReducedPrice = $this->getPrice()->getBruttoPrice();

		$dPercentage = 100 - (100 / $dRegularPrice * $dReducedPrice);

		return round($dPercentage,0);
	}



	/**
	 * Regular price (simple fetch)
	 * @return double
	 */
	public function getRegularPrice()
	{
		$sReturn = $this->oxarticles__oxprice->value;
		return $sReturn;
	}



	/**
	 * Regular price, formatted
	 * Dirty, without use of oxprice! (q&d)
	 * @return string
	 */
	public function getRegularFPrice()
	{
		$sReturn = str_replace('.',',',$this->getRegularPrice());
		return $sReturn;
	}
}