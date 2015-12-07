<?php

namespace Rossina\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use Rossina\StatusProducao;

/**
 * Class StatusProducaoTransformer
 * @package namespace Rossina\Repositories/Transformers;
 */
class StatusProducaoTransformer extends TransformerAbstract
{

    public function transform(StatusProducao $model)
    {
        return [
            'id'                    => (int) $model->id,
            'aguardando_producao'   => (boolean) $model->aguardando_producao,
            'verificando_acabamento'=> (boolean) $model->verificando_acabamento,
            'aguardando_arquivo'    => (boolean) $model->aguradando_arquivo,
            'finalizado'            => (boolean) $model->finalizado,
            'expedido'              => (boolean) $model->expedido,
            'cancelado'             => (boolean) $model->cancelado,
            'devolucao'             => (boolean) $model->devolucao,
            'created_at'            => $model->created_at,
            'updated_at'            => $model->updated_at
        ];
    }
}
