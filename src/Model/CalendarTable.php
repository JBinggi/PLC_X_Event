<?php
/**
 * CalendarTable.php - Event Table
 *
 * Table Model for Event
 *
 * @category Model
 * @package Event
 * @author Verein onePlace
 * @copyright (C) 2020 Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Event\Model;

use Application\Controller\CoreController;
use Application\Model\CoreEntityTable;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Where;
use Laminas\Paginator\Paginator;
use Laminas\Paginator\Adapter\DbSelect;

class CalendarTable extends CoreEntityTable {

    /**
     * EventTable constructor.
     *
     * @param TableGateway $tableGateway
     * @since 1.0.0
     */
    public function __construct(TableGateway $tableGateway) {
        parent::__construct($tableGateway);

        # Set Single Form Name
        $this->sSingleForm = 'calendar-single';
    }

    /**
     * Get Event Entity
     *
     * @param int $id
     * @param string $sKey
     * @return mixed
     * @since 1.0.0
     */
    public function getSingle($id,$sKey = 'Calendar_ID') {
        # Use core function
        return $this->getSingleEntity($id,$sKey);
    }

    /**
     * Save Event Entity
     *
     * @param Event $oEvent
     * @return int Event ID
     * @since 1.0.0
     */
    public function saveSingle(Event $oEvent) {
        $aDefaultData = [
            'label' => $oEvent->label,
        ];

        return $this->saveSingleEntity($oEvent,'Calendar_ID',$aDefaultData);
    }

    /**
     * Generate new single Entity
     *
     * @return Event
     * @since 1.0.0
     */
    public function generateNew() {
        return new Event($this->oTableGateway->getAdapter());
    }
}