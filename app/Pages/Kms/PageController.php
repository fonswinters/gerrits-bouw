<?php

namespace App\Pages\Kms;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Komma\KMS\Core\SectionController;
use App\Pages\Models\Page;
use App\Pages\Models\PageTranslation;

final class PageController extends SectionController
{
    protected $sortable = true;
    protected string $slug = "pages";
    protected string $classModelName = Page::class;
    protected ?string $forTranslationModelName = PageTranslation::class;

    /**
     * @var PageRouteService
     */
    private $routeService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $pageSection = new PageSection($this->slug);
        parent::__construct($pageSection);
        $this->routeService = new PageRouteService();
    }

    protected function save(Model $model, Collection $attributesByValueFrom = null): Model
    {
        parent::save($model, $attributesByValueFrom);
        $this->routeService->createOrUpdateRoutesForModelsTranslationsIfChanged($model);
        return $model;
    }

    protected function destroyForModel(Model $model)
    {
        $this->authorize('destroy', $model);
        $this->routeService->destroyForModel($model);
        return parent::destroyForModel($model); // TODO: Change the autogenerated stub
    }
}