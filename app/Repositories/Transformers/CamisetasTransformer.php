<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\Camisetas;

/**
 * Class CamisetasTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
    class CamisetasTransformer extends TransformerAbstract
{
        protected $defaultIncludes = [
            'generos',
            'cors',
            'tamanhos',
            'silks',
            'etiquetas',
            'tags',
        ];

        /**
         * @param Camisetas $model
         * @return array
         */
        public function transform(Camisetas $model)
    {
        return [
            'id'          => (int) $model->id,
            'name'        => $model->name,
            'price'       => (double) $model->price,
            'price_sem'   => (double) $model->price_sem,
            'description' => $model->description,
            'info'        => $model->info,
            'active'      => (boolean) $model->active,
            'quantidade'  => (int) $model->quantidade,
            'quant_p'     => (int) $model->quantidade_tamanho_p,
            'quant_m'     => (int) $model->quantidade_tamanho_m,
            'quant_g'     => (int) $model->quantidade_tamanho_g,
            'quant_gg'    => (int) $model->quantidade_tamanho_gg,
            'quant_2gg'   => (int) $model->quantidade_tamanho_2gg,
            'quant_3gg'   => (int) $model->quantidade_tamanho_3gg,
            'created_at'  => (string) $model->created_at,
            'updated_at'  => (string) $model->updated_at
        ];
    }

        public function includeGeneros(Camisetas $generos)
        {
            $generos = $generos->generos;

            return $this->collection($generos, new GeneroTransformer);
        }

        public function includeCors(Camisetas $cors)
        {
            $cors = $cors->cors;

            return $this->collection($cors, new CorTransformer);
        }

        public function includeTamanhos(Camisetas $tamanhos)
        {
            $tamanhos = $tamanhos->tamanhos;

            return $this->collection($tamanhos, new TamanhoTransformer);
        }

        public function includeSilks(Camisetas $silks){

            $silks = $silks->silks;

            return $this->collection($silks, new SilkTransformer);
        }

        public function includeEtiquetas(Camisetas $etiquetas)
        {
            $etiquetas = $etiquetas->etiquetas;

            return $this->collection($etiquetas, new EtiquetaTransformer);
        }

        public function includeTags(Camisetas $tags)
        {
            $tags = $tags->tags;

            return $this->collection($tags, new TagTransformer);
        }
}
