<?php
/*
 * Copyright (c) 2013 - 2020 MasterCard International Incorporated
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 */

//namespace App\Libraries\Commonwealth\lib\cw;
class Simplify_Chargeback extends \Simplify_Object {

       /**
        * Retrieve Simplify_Chargeback objects.
        * @param     array criteria a map of parameters; valid keys are:<dl style="padding-left:10px;"></dl>
        * @param     $authentication -  information used for the API call.  If no value is passed the global keys Simplify::public_key and Simplify::private_key are used.  <i>For backwards compatibility the public and private keys may be passed instead of the authentication object.</i>
        * @return    ResourceList a ResourceList object that holds the list of Chargeback objects and the total
        *            number of Chargeback objects available for the given criteria.
        * @see       ResourceList
        */
        static public function listChargeback($criteria = null, $authentication = null) {

            $args = func_get_args();
            $authentication = Simplify_PaymentsApi::buildAuthenticationObject($authentication, $args, 2);

            $val = new Simplify_Chargeback();
            $list = Simplify_PaymentsApi::listObject($val, $criteria, $authentication);

            return $list;
        }


        /**
         * Retrieve a Simplify_Chargeback object from the API
         *
         * @param     string id  the id of the Chargeback object to retrieve
         * @param     $authentication -  information used for the API call.  If no value is passed the global keys Simplify::public_key and Simplify::private_key are used.  <i>For backwards compatibility the public and private keys may be passed instead of the authentication object.</i>
         * @return    Chargeback a Chargeback object
         */
        static public function findChargeback($id, $authentication = null) {

            $args = func_get_args();
            $authentication = Simplify_PaymentsApi::buildAuthenticationObject($authentication, $args, 2);

            $val = new Simplify_Chargeback();
            $val->id = $id;

            $obj = Simplify_PaymentsApi::findObject($val, $authentication);

            return $obj;
        }

    /**
     * @ignore
     */
    public function getClazz() {
        return "Chargeback";
    }
}