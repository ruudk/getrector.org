<?php

declare(strict_types=1);

namespace Rector\Website\Admin\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Rector\Website\CleaningLadyList\Entity\Checkbox;

final class CheckboxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Checkbox::class;
    }

    public function configureFields(string $pageName): array
    {
        return [IdField::new('id'), TextField::new('task'), TextEditorField::new('description')];
    }
}
