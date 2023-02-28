<?php
namespace RKW\RkwProjects\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Class Pages
 *
 * @author Maximilian Fäßler <maximilian@faesslerweb.de>
 * @author Steffen Kroggel <developer@steffenkroggel.de>
 * @copyright RKW Kompetenzzentrum
 * @package RKW_RkwProjects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Pages extends \RKW\RkwBasics\Domain\Model\Pages
{

    /**
     * @var \RKW\RkwProjects\Domain\Model\Projects|null
     */
    protected ?Projects $txRkwprojectsProjectUid = null;


    /**
     * Returns the txRkwprojectsProjectUid
     *
     * @return \RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUid
     */
    public function getTxRkwprojectsProjectUid():? Projects
    {
        return $this->txRkwprojectsProjectUid;
    }


    /**
     * Sets the txRkwprojectsProjectUid
     *
     * @param \RKW\RkwProjects\Domain\Model\Projects $txRkwprojectsProjectUid
     * @return void
     */
    public function setTxRkwprojectsProjectUid(Projects $txRkwprojectsProjectUid): void
    {
        $this->txRkwprojectsProjectUid = $txRkwprojectsProjectUid;
    }

}
