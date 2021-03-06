<?php
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
class Familyform_Model_Group extends Zend_Db_Table {
    protected $_name = 'ourbank_member'; // set ourbank_member table is a base table

        // get group details 
	public function getgroup($id){ 
		$select=$this->select()
			->setIntegrityCheck(false)
			->join(array('a' => 'ourbank_group'),array('id'),array('id as groupid','village_id as officeid','name','group_created_date','groupcode', 'saving_perweek','penalty_latecoming','penalty_notcoming','rateinterest'))
                ->where('a.groupcode=?',$id)
			->join(array('b' => 'ourbank_office'),'b.id  = a.village_id',array('name as officename'))
			->join(array('c' => 'ourbank_address'),'c.id  = a.id',array('address1','address2','address3','city','district','state','zipcode'));
		//	->join(array('d' => 'ourbank_groupmember'),'d.member_id  = a.id',array('address1','address2','address3','city','district','state','zipcode'));

		// die($select->__toString($select));

		$result=$this->fetchAll($select);
		return $result->toArray();
        } 
        // get group location geo location 
	public function getlocation($id){ 
		$select=$this->select()
			->setIntegrityCheck(false)
			->join(array('a' => 'ourbank_group'),array('id'),array('latitude','longitude'))	->where('a.id = '.$id);
		$result=$this->fetchAll($select);
		return $result->toArray();
        }
        // get group members 
        public function getgroupmembers($id)
        {
        $select=$this->select()
                ->setIntegrityCheck(false)
        	->join(array('a' => 'ourbank_groupmembers'),array('group_id'),array('group_id as groupid','member_id'))
		->where('a.groupmember_status = 3 or a.groupmember_status = 1')
		->where('a.group_id = '.$id)
         	->join(array('b' => 'ourbank_familymember'),'b.id = a.member_id')
		->join(array('c' => 'ourbank_group'),'c.id ='.$id,array('head'));
       $result=$this->fetchAll($select);
       return $result->toArray();
    }
     // get module description  details 
    public function getmodule($modulename)
   {
      $select=$this->select()
                   ->setIntegrityCheck(false)
                   ->join(array('ourbank_modules'),array('module_id'))
                   ->where('module_description=?',$modulename);
        $result=$this->fetchAll($select);
       return $result->toArray();
   }
}
