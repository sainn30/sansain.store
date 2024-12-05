<?php

namespace App\Models;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesananDetail extends Model
{
    use HasFactory;

    public function barang()
	{
	      return $this->belongsTo('App\models\Barang','barang_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\models\Pesanan','pesanan_id', 'id');
	}
}
