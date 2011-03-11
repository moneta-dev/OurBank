<?php
/*
############################################################################
#  This file is part of OurBank.
############################################################################
#  OurBank is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as
#  published by the Free Software Foundation, either version 3 of the
#  License, or (at your option) any later version.
############################################################################
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
############################################################################
#  You should have received a copy of the GNU Affero General Public License
#  along with this program.  If not, see <http://www.gnu.org/licenses/>.
############################################################################
*/
?>

<?php
class Creditline_Form_Creditline extends Zend_Form 
{

	public function init() 
	{
		$formfield = new App_Form_Field();

		$vtype=array('float');
		$table='ob_creditline';
		$fieldname='name';

		$creditlinename = $formfield->field('Text','name',$table,$fieldname,'mand','Name',true,'','','','','',1,0);
		$protfoliovalue = $formfield->field('Text','portfolio','','','mand','portfolio value',true,$vtype,'','','','',1,0);
		$creditlinefrom = $formfield->field('Text','start_date','','','mand','Start Date',true,'','','','','',1,0);
		$creditlineto = $formfield->field('Text','end_date','','','mand','End Date',true,'','','','','',1,0);
		$status = $formfield->field('Checkbox','status','','','mand','Active','','','','','','',1,0);

		$this->addElements(array($creditlinename,$protfoliovalue,$creditlinefrom,$creditlineto,$status));
	}

//                 $ValidateRange =  new Zend_Validate_Between(1, 999999.99);
//                 $protfoliovalue = new Zend_Form_Element_Text('portfoliovalue');
//                 $protfoliovalue->setAttrib('class', 'txt_put');
//                 $protfoliovalue->setAttrib('id', 'interest');
//                 $ValidateFloat = new Zend_Validate_Float();
//                 $ValidateFloat->setLocale(new Zend_Locale('pt_BR'));
//                 $protfoliovalue->addValidator($ValidateRange);
//                 $protfoliovalue->addValidator($ValidateFloat);


}