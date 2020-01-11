<?php

namespace Okotieno\Procurement\Traits;

trait canProcure {
    public function procurementRequests() {
        return $this->hasMany(\Okotieno\Procurement\Models\ProcurementRequest::class, 'requested_by');
    }
}
