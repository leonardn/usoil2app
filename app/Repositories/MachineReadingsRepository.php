<?php
namespace App\Repositories;
use App\Models\MachineReadings;
use InfyOm\Generator\Common\BaseRepository;
class MachineReadingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
		'restaurant_id',
        'machine_id',
        'temperature_reading' => 'like',
        'reading_date_time' => '>=',
        'reading_date_time' => '<=',
    ];
    /**
     * Configure the Model
     **/
    public function model()
    {
        return MachineReadings::class;
    }
    public function search($request){
        $search         = explode(';', $request->search);
        $fields         = [];
        foreach($search as $k){
            $t          = explode(':', $k);
            $fields[$t[0]]  = $t[1];
            }
        return MachineReadings::where(function($query) use ($fields){
            if(isset($fields['restaurant_id'])){$query->where('restaurant_id', $fields['restaurant_id']);}
            if(isset($fields['machine_id'])){$query->where('machine_id', $fields['machine_id']);}
            if(isset($fields['temperature_reading'])){$query->where('temperature_reading', $fields['temperature_reading']);}
            if(isset($fields['reading_date_time_from']) && isset($fields['reading_date_time_to']))
            {
                $query->whereDate('reading_date_time','>=',$fields['reading_date_time_from']);
                $query->whereDate('reading_date_time','<=',$fields['reading_date_time_to'])->toSql();
                
                //$query->whereBetween('reading_date_time', array($fields['reading_date_time_from'], $fields['reading_date_time_to']));
            }
        });
    }
}
