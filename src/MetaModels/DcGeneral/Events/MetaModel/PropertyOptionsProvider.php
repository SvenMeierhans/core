<?php

/**
 * This file is part of MetaModels/core.
 *
 * (c) 2012-2015 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2015 The MetaModels team.
 * @license    https://github.com/MetaModels/core/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace MetaModels\DcGeneral\Events\MetaModel;

use ContaoCommunityAlliance\DcGeneral\Contao\View\Contao2BackendView\Event\GetPropertyOptionsEvent;
use MetaModels\Attribute\IAttribute;
use MetaModels\DcGeneral\Data\Model;

/**
 * This class retrieves the options of an attribute within a MetaModel unless someone else already provided them.
 */
class PropertyOptionsProvider
{
    /**
     * Retrieve the property options.
     *
     * @param GetPropertyOptionsEvent $event The event.
     *
     * @return void
     */
    public static function getPropertyOptions(GetPropertyOptionsEvent $event)
    {
        if (null !== $event->getOptions()) {
            return;
        }
        $model = $event->getModel();
        if (!($model instanceof Model)) {
            return;
        }
        $attribute = $model->getItem()->getAttribute($event->getPropertyName());
        if (!($attribute instanceof IAttribute)) {
            return;
        }

        try {
            $options = $attribute->getFilterOptions(null, false);
        } catch (\Exception $exception) {
            $options = array('Error: ' . $exception->getMessage());
        }

        $event->setOptions($options);
    }
}
