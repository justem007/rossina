<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\CategoriaFaq;

/**
 * Class CategoriaFaqTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class CategoriaFaqTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'faqs'
    ];

    public function transform(CategoriaFaq $model)
    {
        return [
            'id'                    => (int) $model->id,
            'title'                 => $model->title,
            'description'           => $model->description,
            'created_at'            => (string) $model->created_at,
            'updated_at'            => (string) $model->updated_at
        ];
    }

    public function includeFaqs(CategoriaFaq $faqs)
    {
        $faqs = $faqs->faqs;

        return $this->collection($faqs, new FaqTransformer);
    }
}
