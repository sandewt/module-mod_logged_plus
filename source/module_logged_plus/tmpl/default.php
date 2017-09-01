<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_logged_plus
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

?>
<div class="row-striped">
	<div class="row-fluid">
		<div class="span7 hidden-phone">
			<?php echo JText::_('JGLOBAL_TITLE'); ?>
		</div>
		<div class="span2 hidden-phone">
			<?php echo JText::_('JFIELD_MOD_LOGGED_PLUS_LAST_VISIT_LABEL'); ?>
		</div>
		<div class="span2 hidden-phone">
			<?php echo JText::_('JFIELD_MOD_LOGGED_PLUS_LAST_ACTIVITY_LABEL'); ?>
		</div>
		<div class="span1 hidden-phone">
			<?php echo JText::_('JFIELD_MOD_LOGGED_PLUS_LAST_SPENDINGTIME_LABEL'); ?>
		</div>
	</div>
	<?php foreach ($users as $user) : ?>
		<div class="row-fluid">
			<div class="span7">
				<?php if ($user->client_id == 0) : ?>
					<a title="<?php echo JHtml::_('tooltipText', 'MOD_LOGGED_PLUS_LOGOUT'); ?>" href="<?php echo $user->logoutLink; ?>" class="btn btn-danger btn-mini hasTooltip">
						<span class="icon-remove icon-white" aria-hidden="true"><span class="element-invisible"><?php echo JText::_('JLOGOUT'); ?></span></span>
					</a>
				<?php endif; ?>

				<strong class="row-title">
					<?php if (isset($user->editLink)) : ?>
						<a href="<?php echo $user->editLink; ?>" class="hasTooltip" title="<?php echo JHtml::_('tooltipText', 'JGRID_HEADING_ID'); ?> : <?php echo $user->id; ?>">
							<?php echo $user->name; ?></a>
					<?php else : ?>
						<?php echo $user->name; ?>
					<?php endif; ?>
				</strong>

				<small class="small hasTooltip" title="<?php echo JHtml::_('tooltipText', 'JCLIENT'); ?>">
					<?php if ($user->client_id === null) : ?>
						<?php // Don't display a client ?>
					<?php elseif ($user->client_id) : ?>
						<?php echo JText::_('JADMINISTRATION'); ?>
					<?php else : ?>
						<?php echo JText::_('JSITE'); ?>
					<?php endif; ?>
				</small>
			</div>
			<div class="span2">
				<div class="small pull-left hasTooltip" title="<?php echo JHtml::_('tooltipText', 'MOD_LOGGED_PLUS_LAST_VISIT'); ?>">
					<span class="icon-calendar" aria-hidden="true"></span> <?php echo JHtml::_('date', $user->lastvisitDate, JText::_('DATE_FORMAT_LC5')); ?>
				</div>
			</div>
			<div class="span2">
				<div class="small pull-left hasTooltip" title="<?php echo JHtml::_('tooltipText', 'MOD_LOGGED_PLUS_LAST_ACTIVITY'); ?>">
					<span class="icon-calendar" aria-hidden="true"></span> <?php echo JHtml::_('date', $user->time, JText::_('DATE_FORMAT_LC5')); ?>
				</div>
			</div>
			<div class="span1">
				<div class="small pull-left hasTooltip" title="<?php echo JHtml::_('tooltipText', 'MOD_LOGGED_PLUS_SPENDINGTIME'); ?>">
					<span class="icon-clock" aria-hidden="true"></span> <?php echo round((strtotime(JHtml::_('date', $user->time, 'H:i:s')) - strtotime(JHtml::_('date', $user->lastvisitDate, 'H:i:s'))) / 60); ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
