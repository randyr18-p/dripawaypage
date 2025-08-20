<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Faqs extends Component
{
    /**
     * @param array|null $faqs  Lista de FAQs (opcional). Si viene null, se toma de config('faqs.items')
     * @param int|null   $limit Límite de ítems a mostrar (opcional). Si null, se muestran todos.
     * @param bool       $showCta Mostrar bloque CTA inferior (por defecto true).
     */
    public function __construct(
        public ?array $faqs = null,
        public ?int $limit = null,
        public bool $showCta = true
    ) {}

    public function render(): View
    {
        // Fuente única de verdad
        $items = $this->faqs ?? config('faqs.items', []);

        // Subset si aplica
        if ($this->limit !== null) {
            $items = array_slice($items, 0, $this->limit);
        }

        return view('components.faqs', [
            'items'   => $items,
            'showCta' => $this->showCta,
        ]);
    }
}
