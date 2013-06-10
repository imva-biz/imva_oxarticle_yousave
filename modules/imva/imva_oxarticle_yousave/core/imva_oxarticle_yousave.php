<?php
/**
 *    imva_oxarticle_yousave
 *    oxarticle extension
 *    (c) 2013 imva.biz // ja@imva.biz
 *    
 *    This file is intellectual property of IMVA.BIZ (http://imva.biz).
 *    Any unauthorized copying, editing, redistribution of this file ist prohibited and will be prosecuted.
 *    This file is protected by international copyright and copyright in Germany and the European Union.
 *    
 *      --the Author.
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
		$sReturn = str_replace($this->getRegularPrice(),'.','.');
		return $sReturn;
	}
}
