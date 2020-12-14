<?php

declare(strict_types=1);

namespace Rector\Website\Form;

use Rector\Website\Entity\ContactMessage;
use Rector\Website\ValueObject\FormChoices;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ContactFormType extends AbstractType
{
    /**
     * @var string
     */
    private const PICK_ONE_PLACEHOLDER = 'Pick one...';

    /**
     * @param mixed[] $options
     */
    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
        $formBuilder->add('projectSize', ChoiceType::class, [
            'label' => 'Project size',
            'placeholder' => self::PICK_ONE_PLACEHOLDER,
            'required' => true,
            'choices' => [
                'Smaller than 100 000 lines' => 100_000,
                '< 250 000 lines' => 250_000,
                '< 500 000 lines' => 500_000,
                '< 1 000 000 lines' => 1_500_000,
                '< 2 500 000 lines' => 2_500_000,
                '< 5 000 000 lines' => 5_500_000,
                'More than 5 million lines' => 9_999_999,
            ],
        ]);

        $formBuilder->add('framework', TextType::class, [
            'label' => 'Used PHP framework',
            'attr' => [
                'placeholder' => 'E.g. Symfony 2.8',
            ],
        ]);

        $formBuilder->add('currentPhpVersion', ChoiceType::class, [
            'label' => 'Current PHP version',
            'placeholder' => self::PICK_ONE_PLACEHOLDER,
            'choices' => FormChoices::CURRENT_PHP_VERSION,
        ]);

        $formBuilder->add('targetPhpVersion', ChoiceType::class, [
            'label' => 'Target PHP version',
            'placeholder' => 'If relevant...',
            'choices' => FormChoices::TARGET_PHP_VERSION,
            'required' => false,
        ]);

        $formBuilder->add('message', TextareaType::class, [
            'label' => 'What do you need help with?',
            'attr' => [
                'rows' => 5,
            ],
        ]);

        $formBuilder->add('name', TextType::class, [
            'label' => 'What is your name?',
            'required' => true,
        ]);

        $formBuilder->add('email', TextType::class, [
            'label' => 'What is your email?',
            'required' => true,
        ]);

        $formBuilder->add('submit', SubmitType::class, [
            'label' => 'Send Message',
            'attr' => [
                'class' => 'btn btn-success btn-lg',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver->setDefaults([
            'data_class' => ContactMessage::class,
        ]);
    }
}
