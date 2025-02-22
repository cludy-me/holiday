<?php namespace OpenDroplet\Holiday\Provider;

/**
 * Portugal holiday provider
 *
 * @author Tiago Carvalho <tiago.carvalho@beubi.com>
 */
class PT extends AbstractEaster
{

    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear(int $year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = [
            '01-01' => $this->createData('Ano Novo'),
            '04-25' => $this->createData('25 de Abril'),
            '05-01' => $this->createData('Dia do Trabalhador'),
            '06-10' => $this->createData('Dia de Portugal'),
            '08-15' => $this->createData('Assunção de Nossa Senhora'),
            '12-08' => $this->createData('Dia da Imaculada Conceição'),
            '12-25' => $this->createData('Natal'),
            // Variable dates
            $easter['goodFriday']->format(self::DATE_FORMAT)    => $this->createData('Sexta-Feira Santa'),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Páscoa'),
        ];
        //add holidays post 2015
        if ($year >= 2016) {
            $holidays['05-26'] = $this->createData('Corpo de Deus');
            $holidays['10-05'] = $this->createData('Implantação da República');
            $holidays['11-01'] = $this->createData('Dia de Todos os Santos');
            $holidays['12-01'] = $this->createData('Restauração da Independência');
        }

        return $holidays;
    }
}
