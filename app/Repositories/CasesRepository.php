<?php

namespace App\Repositories;

use App\Models\Cases;
use App\Models\CaseAdditional;
use App\Models\StudentProgram;
use Illuminate\Support\Facades\DB;
class CasesRepository
{
    use BaseRepository;

    /**
     * Cases Model
     *
     * @var Cases
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Cases $Cases
     */
    public function __construct(Cases $Cases)
    {
        $this->model = $Cases;
    }

    /**
     * Get number of the records
     *
     * @param  Request $request
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginate
     */
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
    public function findByIDs($ids, $sort_field=false, $order=false, $fields=null, $additional=true){
        if(!$sort_field){
            $sort_field = 'c.created_at';
        }
        if(!$order){
            $order = 'DESC';
        }
        if(!is_array($ids)){
            $ids = array($ids);
        }
        // $user = Account::getUserId();
        $user = 350;
        // $payment = Payment::selectRaw('p.case_id, SUM(p.amount) as paid')->from('payments as p')->where('p.status_id', 3)
        //         ->groupBy('p.case_id');
                
        $result = Cases::selectRaw(
            'c.id, c.company_id,c.is_duplicate,c.last_action,c.action_count,c.created_at,c.updated_at,
            cc.first_name,cc.last_name,cc.middle_name,cc.email,cc.primary_phone,cc.secondary_phone,cc.mobile_phone,
            cc.ssn,cc.dob,cc.fax,cc.address,cc.address_2,cc.city,cc.state,cc.zip,cc.country,cc.timezone,cc.title,
            cc.dpp_contact_id,cc.direct_mail_id,cc.credit_score,cc.vendor_id,
            cs.is_company,cs.status_id,cs.campaign_id,cs.is_client,cs.docs_status,cs.is_deleted,
            cs.accounting_status_id,cs.doc_submission,cs.status_updated,cs.dialer_updated,cs.accounting_updated,
            cs.financed, actype.name as accounting_type,cs.renewal_date,cs.shark_tank,cs.shark_tank_date,
            s.name as status,
            dialer_s.name as dialer_status,
            m.name as milestone,
            camp.name as campaign,
            com.name as company,
            es.updated as signed_date,
            cs.doc_submission as submission_date,
            COALESCE(TIMESTAMPDIFF(DAY,cs.status_updated,"'.date('Y-m-d H:i:s').'"),0) as days_status,
            inv.total as invoice_amount,
            f.status as financing_status,
            f.score as financing_score,
            f.application_id as financing_application_id,
            fpayments.payments_status as financing_payment_status,
            f.track as ea_track,
            p.paid as paid,
            c.id as case_id,
            acstatus.name as accounting_status_name,
            cv.timestamp as viewed')
            ->from('cases as c')
            ->leftJoin('case_contact as cc', 'cc.case_id', 'c.id')
            ->leftJoin('case_statuses as cs', 'cs.case_id', 'c.id')
            ->leftJoin('statuses as s', 's.id', 'cs.status_id')
            ->leftJoin('milestones as m', 'm.id', 's.milestone_id')
            ->leftJoin('companies as com','com.id', 'c.company_id')
            ->leftJoin('campaigns as camp', 'cs.campaign_id', 'camp.id')
            ->leftJoin('esign_docs as es', 'es.case_id', 'c.id')
            ->leftJoin('case_todos as cto', 'cto.case_id', 'c.id')
            ->leftJoin('accounting_statuses as acstatus', 'acstatus.id', 'cs.accounting_status_id')
            ->leftJoin('invoices as inv', 'inv.case_id', 'c.id')
            ->leftJoin('accounting_types as actype', 'actype.id', 'cs.account_type_id')
            ->leftJoin('case_views as cv', function($q) use ($user) { 
                $q->where('cv.case_id','c.id')->where('cv.user_id',null, $user);
            })
            ->leftJoin('case_labels as clb', 'clb.case_id', 'c.id')
            ->leftJoin('financing as f', 'f.case_id', 'c.id')
            ->leftJoin(DB::raw("(select SUM(p.amount) as paid, p.case_id
                from payments p
                where p.status_id = 3
                group by p.case_id) as p"), 'p.case_id', 'c.id')
            ->leftJoin('financing_payments as fpayments', 'fpayments.case_id','c.id')
            ->leftJoin('statuses as dialer_s', 'dialer_s.id', 'cs.dialer_id');
        
        $sfl = 0;
        // TODO fix static assignments, dynamic departments based on company or network
        $user_assignments = array(
            array('clean_name' => 'sales_rep', 'id' => 8),
            array('clean_name' => 'processor', 'id' => 3),
            array('clean_name' => 'ast_processor', 'id' => 12),
            array('clean_name' => 'collector', 'id' => 1),
            array('clean_name' => 'renewal_account_manager', 'id' => 31)

        );
        foreach ($user_assignments as $ua) {
            $alias = 'cass_'  . $sfl;
            $ualias = 'user_' . $sfl;
            $dalias = 'dept_' . $sfl;
            $result->selectRaw("'"
                .$ualias.'.id as dept_'.$ua['clean_name'].'_id,'
                .$ualias.'.email as dept_'.$ua['clean_name'].'_email,'
                .$ualias.'.first_name as dept_'.$ua['clean_name'].'_first_name, '
                .$ualias.'.last_name as dept_'.$ua['clean_name'].'_last_name, 
                CONCAT('.$ualias.'.first_name'.', " ", '.$ualias.'.last_name'.') as dept_'.$ua['clean_name'].'_full_name, 
                CONCAT('.$ualias.'.first_name'.', " ", '.$ualias.'.last_name'.') as dept_'.$ua['clean_name'].
            "'");
            $result->leftJoin('case_assignments as '.$alias, function($query) use ($alias, $ua) {
                $query->where($alias . '.case_id', 'c.id')->where($alias . '.department_id', $ua['id']);
            });
            $result->leftJoin('departments as '.$dalias, $dalias . '.id', $alias.'.user_id');
            $result->leftJoin('users as '.$ualias, $ualias . '.id', $alias.'.user_id');
            $sfl++;
        }
      
        if(isset($fields) && is_array($fields)) {
            if(in_array('last_payment_amount', $fields) || in_array('last_payment_date', $fields) || in_array('last_payment_date_due', $fields) ){
                $result->selectRaw('
                    last_payment.amount as last_payment_amount,
                    last_payment.created as last_payment_date,
                    last_payment.date_due as last_payment_date_due,
                    last_payment_statuses.name as last_payment_status
                ');
                $result->leftJoin(DB::raw("(select MAX(payments.id) payment_id, payments.case_id
                    from payments
                    group by payments.case_id) as last_payment_max"), 'last_payment_max.case_id', 'c.id');
                $result->join('payments as last_payment', 'last_payment.id', 'last_payment_max.payment_id');
                $result->join('payment_statuses','last_payment_statuses', 'last_payment_statuses.id', 'last_payment.status_id');
            }
            if (in_array('first_schedule_amount', $fields) || in_array('first_schedule_date', $fields) || in_array('first_schedule_status', $fields)) {
                $result->selectRaw('
                    fpschedules.amount as first_schedule_amount,
                    fpschedules.date_due as first_schedule_date,
                    fp_ps.name as first_schedule_status
                ');
                $result->leftJoin('payment_schedules as fpschedules', function($query){
                    $query->where('fpschedules.case_id', 'c.id')->where('fpschedules.pmt_num', 1);
                });
                $result->leftJoin('payment_statuses as fp_ps', 'fp_ps.id', 'fpschedules.status_id');
            }
            if (in_array('second_schedule_amount', $fields) || in_array('second_schedule_date', $fields) || in_array('second_schedule_status', $fields)) {
                $result->selectRaw('
                    fpschedules2.amount as second_schedule_amount,
                    fpschedules2.date_due as second_schedule_date,
                    fp_ps2.name as second_schedule_status
                ');
                $result->leftJoin('payment_schedules as fpschedules2', function($query){
                    $query->where('fpschedules2.case_id', 'c.id')->where('fpschedules2.pmt_num', 2);
                });
                $result->leftJoin('payment_statuses as fp_ps2', 'fp_ps2.id', 'fpschedules2.status_id');
            }
            if (in_array('third_schedule_amount', $fields) || in_array('third_schedule_date', $fields) || in_array('third_schedule_status', $fields)) {
                $result->selectRaw('
                    fpschedules3.amount as third_schedule_amount,
                    fpschedules3.date_due as third_schedule_date,
                    fp_ps3.name as third_schedule_status'
                );
                $result->leftJoin('payment_schedules as fpschedules3', function($query){
                    $query->where('fpschedules3.case_id', 'c.id')->where('fpschedules3.pmt_num', 3);
                });
                $result->leftJoin('payment_statuses as fp_ps3', 'fp_ps3.id', 'fpschedules3.status_id');
            }
            if (in_array('first_paid_amount', $fields) || in_array('first_paid_schedule_date', $fields) || in_array('first_paid_cleared_date', $fields)) {
                $result->selectRaw('
                    fpschedulespaid.amount as first_paid_amount,
                    fpschedulespaid.date_due as first_paid_schedule_date,
                    fpschedulespaid.cleared_date as first_paid_cleared_date
                ');
                $result->leftJoin('payment_schedules as fpschedulespaid', function($query){
                    $query->where('fpschedulespaid.case_id','c.id')->where('fpschedulespaid.paid_pmt_num', 1);
                });
            }
            if (in_array('second_paid_amount', $fields) || in_array('second_paid_schedule_date', $fields) || in_array('second_paid_cleared_date', $fields)) {
                $result->selectRaw('
                    fpschedulespaid2.amount as second_paid_amount,
                    fpschedulespaid2.date_due as second_paid_schedule_date,
                    fpschedulespaid2.cleared_date as second_paid_cleared_date
                ');
                $result->join('payment_schedules as fpschedulespaid2', function($query){
                    $query->where('fpschedulespaid2.case_id', 'c.id')->where('fpschedulespaid2.paid_pmt_num', 2);   
                });
            }
            if (in_array('third_paid_amount', $fields) || in_array('third_paid_schedule_date', $fields) || in_array('third_paid_cleared_date', $fields)) {
                $result->selectRaw('
                    fpschedulespaid3.amount as third_paid_amount,
                    fpschedulespaid3.date_due as third_paid_schedule_date,
                    fpschedulespaid3.cleared_date as third_paid_cleared_date
                ');
                $result->leftJoin('payment_schedules as fpschedulespaid3', function($query){
                    $query->where('fpschedulespaid3.case_id', 'c.id')->where('fpschedulespaid3.paid_pmt_num', 3);
                });
            }
            if (in_array('invoices_total', $fields)) {
                $result->selectRaw('invoices.invoices_total as invoices_total');
                $result->leftJoin(DB::raw("(select SUM(i.total) as invoices_total, i.case_id
                    from invoices i
                    group by i.case_id)') as invoices"), 'invoices.case_id', 'c.id');
            }
        }
        $db_result = $result->whereIn('c.id', $ids)->orderBy($sort_field, $order)->get()->toArray();
      
        return $this->buildResult($db_result, $fields, $additional);
    }

    public function buildResult($db_result, $column_names = null, $useAdditional = true){

        $data = array();
        $ids = array();

        $result = $db_result;

        foreach($result as $row){

            $ids[] = $row['id'];

            foreach($row as $key => $value){
                $data[$row['id']][$key] = $value;
            }

            if(isset($row['clean_name'])) {
                $data[$row['id']][$row['clean_name']] = $row[$row['f_field']];
            }

            if(isset($row['assignment_name']) && isset($row['assignment_user'])){
                $data[$row['id']]['dept_'.$row['assignment_name']] =  $row['assignment_user'];
                if(isset($row['assignment_user_id']) && !empty($row['assignment_user_id'])){
                    $data[$row['id']]['dept_'.$row['assignment_name'].'_id'] =  $row['assignment_user_id'];
                }
                if(isset($row['assignment_user_email']) && !empty($row['assignment_user_email'])){
                    $data[$row['id']]['dept_'.$row['assignment_name'].'_email'] =  $row['assignment_user_email'];
                }
            }
        }

        if($useAdditional) {

            if (isset($ids) && !empty($ids)) {

                $q = CaseAdditional::select('case_additional.*', 'form_field_types.f_field', 'form_fields.clean_name')
                    ->leftJoin('form_fields', 'case_additional.field_id', 'form_fields.id')
                    ->leftJoin('form_field_types', 'form_fields.field_type_id', 'form_field_types.id')
                    ->whereIn('case_id', $ids)
                    ->where('form_fields.system', 0);

                if (isset($column_names)) {

                    if (!empty($fnames)) {
                        $q->whereIn('form_fields.clean_name', $column_names);
                    }

                }

                $additional_records = $q->get()->toArray();
                if (isset($additional_records) && !empty($additional_records)) {
                    foreach ($additional_records as $obj) {
                        if (isset($obj[$obj['f_field']]) && !empty($obj[$obj['f_field']])) {
                            $data[$obj['case_id']][$obj['clean_name']] = $obj[$obj['f_field']];
                        }
                    }
                }

            }
        }

        if(isset($ids) && !empty($ids)) {
            $student_program_sets = StudentProgram::whereIn('case_id',$ids)->get()->toArray();
            if ($student_program_sets) {
                foreach ($student_program_sets as $student_programs) {
                    foreach ($student_programs as $spk => $spv) {
                        $data[$student_programs['case_id']]['student_programs_' . $spk] = $spv;
                    }
                }
            }
        }
        return array_values($data);
    }
}