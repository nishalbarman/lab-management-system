<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

    body {
        font-family: "Open Sans", sans-serif;
        background-color: #e4e4e4;
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .card {
        background-color: #ffffff;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    }

    .table-concept {
        width: 100%;
        height: 100%;
        max-height: 100%;
        overflow: auto;
        box-sizing: border-box;
    }

    .table-concept .table-radio {
        display: none;
    }

    .table-concept .table-radio:checked+.table-display {
        display: block;
    }

    .table-concept .table-radio:checked+.table-display+table {
        width: 100%;
        display: table;
    }

    .table-concept .table-radio:checked+.table-display+table+.pagination {
        display: flex;
    }

    .table-concept .table-radio:checked+.table-display+table+.pagination>label.active {
        color: #ffffff;
        background-color: dimgray;
        cursor: default;
    }

    .table-concept .table-radio:checked+.table-display+table+.pagination>label.disabled {
        color: #ffffff;
        background-color: #b5b5b5;
        cursor: default;
    }

    .table-concept .table-display {
        background-color: #e2e2e2;
        text-align: right;
        padding: 10px;
        display: none;
        position: sticky;
        left: 0;
    }

    .table-concept table {
        background-color: #ffffff;
        font-size: 16px;
        border-collapse: collapse;
        display: none;
    }

    .table-concept table tr:last-child td {
        border-bottom: 0;
    }

    .table-concept table tr th,
    .table-concept table tr td {
        text-align: left;
        padding: 15px;
        box-sizing: border-box;
    }

    .table-concept table tr th {
        color: #ffffff;
        font-weight: normal;
        background-color: #8f8f8f;
        border-bottom: solid 2px #d8d8d8;
        position: sticky;
        top: 0;
    }

    .table-concept table tr td {
        border: solid 1px #d8d8d8;
        border-left: 0;
        border-right: 0;
        white-space: nowrap;
    }

    .table-concept table tbody tr {
        transition: background-color 150ms ease-out;
    }

    .table-concept table tbody tr:nth-child(2n) {
        background-color: whitesmoke;
    }

    .table-concept table tbody tr:hover {
        background-color: #ebebeb;
    }

    .table-concept .pagination {
        background-color: #8f8f8f;
        width: 100%;
        display: none;
        position: sticky;
        bottom: 0;
        left: 0;
    }

    .table-concept .pagination>label {
        background-color: #8f8f8f;
        color: #ffffff;
        padding: 10px;
        cursor: pointer;
    }

    .table-concept .pagination>label:hover {
        background-color: darkgray;
    }

    .table-concept .pagination>label:active {
        background-color: #767676;
    }

    .table-title {
        color: #ffffff;
        background-color: #2f2f2f;
        padding: 15px;
    }

    .table-title h2 {
        margin: 0;
        padding: 0;
    }

    .button-container {
        width: 100%;
        box-sizing: border-box;
        display: flex;
        justify-content: flex-end;
    }

    .button-container span {
        color: #8f8f8f;
        text-align: right;
        min-height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 10px;
        margin-right: 10px;
    }

    .button-container button {
        font-family: inherit;
        font-size: inherit;
        color: #ffffff;
        padding: 10px 15px;
        border: 0;
        margin: 0;
        outline: 0;
        border-radius: 0;
        transition: background-color 225ms ease-out;
    }

    .button-container button.primary {
        background-color: #147eff;
    }

    .button-container button.primary:hover {
        background-color: #479aff;
    }

    .button-container button.primary:active {
        background-color: #0065e0;
    }

    .button-container button.primary {
        background-color: #147eff;
    }

    .button-container button.primary:hover {
        background-color: #479aff;
    }

    .button-container button.primary:active {
        background-color: #0065e0;
    }

    .button-container button.danger {
        background-color: #d11800;
    }

    .button-container button.danger:hover {
        background-color: #ff2205;
    }

    .button-container button.danger:active {
        background-color: #9e1200;
    }

    .button-container button svg {
        fill: #ffffff;
        vertical-align: middle;
        padding: 0;
        margin: 0;
    }
    </style>
</head>

<body>

    <div class="card">
        <div class="table-title">
            <h2>CSS ONLY TABLE</h2>
        </div>
        <div class="button-container"><span>These buttons aren't working ></span>
            <button class="danger" title="Delete Selected">
                <svg viewBox="0 0 448 512" width="16" title="trash-alt">
                    <path
                        d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                    </path>
                </svg>
            </button>
            <button class="primary" title="Add New Data">
                <svg viewBox="0 0 512 512" width="16" title="plus-circle">
                    <path
                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z">
                    </path>
                </svg>
            </button>
        </div>



        <?php
        include('includes/config/connect.php');

        $sql = "select * from reports;";
        $result = $conn->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $data = array_reverse($data);
        $numrows = $result->num_rows;
        $c = 0;
        $part = 1;
        ?>

        <div class="table-concept">
            <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked" />
            <div class="table-display">Showing 1 to <?php echo $part = $part * 20; ?> of <?php echo $numrows; ?> items
            </div>

            <?php if ($c / 20 == 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>FIRST HEADER</th>
                        <th>SECOND HEADER</th>
                        <th>THIRD HEADER</th>
                        <th>FOURTH HEADER</th>
                        <th>FIFTH HEADER</th>
                        <th>Six HEADER</th>
                    </tr>
                </thead>
                <tbody>
                    <?php } ?>

                    <?php foreach ($data as $rp_dtl): ?>

                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>
                            <?php echo $rp_dtl['id']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['patient_name']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['file_name']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['patient_age']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['file_name']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['created_by']; ?>
                        </td>
                        <td>
                            <?php echo $rp_dtl['downloads']; ?>
                        </td>
                    </tr>
                    <?php if ($c / 20 == 0) { ?>
                </tbody>
            </table>
            <div class="pagination">
                <label class="disabled" for="table_radio_-1">&laquo; Previous</label>
                <?php for ($c = 0; $c < $numrows; $c++): ?>
                <label class="active" for="table_radio_<?php echo $c; ?>" id="table_pager_<?php echo $c; ?>">
                    <?php echo $c + 1; ?>
                </label>
                <?php endfor; ?>
                <label for="table_radio_1">Next &raquo;</label>
            </div>
            <input class="table-radio" type="radio" name="table_radio" id="table_radio_1" />
            <div class="table-display">Showing <?php echo $part + 1; ?> to <?php echo $part = $part * 20; ?> of
                <?php echo $numrows; ?> items
            </div>
            <?php } ?>

            <?php $c++; ?>
            <?php endforeach; ?>




            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>FIRST HEADER</th>
                        <th>SECOND HEADER</th>
                        <th>THIRD HEADER</th>
                        <th>FOURTH HEADER</th>
                        <th>FIFTH HEADER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>1</td>
                        <td>This is Item number 1-1</td>
                        <td>This is Item number 2-1</td>
                        <td>This is Item number 3-1</td>
                        <td>This is Item number 4-1</td>
                        <td>This is Item number 5-1</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>2</td>
                        <td>This is Item number 1-2</td>
                        <td>This is Item number 2-2</td>
                        <td>This is Item number 3-2</td>
                        <td>This is Item number 4-2</td>
                        <td>This is Item number 5-2</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>3</td>
                        <td>This is Item number 1-3</td>
                        <td>This is Item number 2-3</td>
                        <td>This is Item number 3-3</td>
                        <td>This is Item number 4-3</td>
                        <td>This is Item number 5-3</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>4</td>
                        <td>This is Item number 1-4</td>
                        <td>This is Item number 2-4</td>
                        <td>This is Item number 3-4</td>
                        <td>This is Item number 4-4</td>
                        <td>This is Item number 5-4</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>5</td>
                        <td>This is Item number 1-5</td>
                        <td>This is Item number 2-5</td>
                        <td>This is Item number 3-5</td>
                        <td>This is Item number 4-5</td>
                        <td>This is Item number 5-5</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>6</td>
                        <td>This is Item number 1-6</td>
                        <td>This is Item number 2-6</td>
                        <td>This is Item number 3-6</td>
                        <td>This is Item number 4-6</td>
                        <td>This is Item number 5-6</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>7</td>
                        <td>This is Item number 1-7</td>
                        <td>This is Item number 2-7</td>
                        <td>This is Item number 3-7</td>
                        <td>This is Item number 4-7</td>
                        <td>This is Item number 5-7</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>8</td>
                        <td>This is Item number 1-8</td>
                        <td>This is Item number 2-8</td>
                        <td>This is Item number 3-8</td>
                        <td>This is Item number 4-8</td>
                        <td>This is Item number 5-8</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>9</td>
                        <td>This is Item number 1-9</td>
                        <td>This is Item number 2-9</td>
                        <td>This is Item number 3-9</td>
                        <td>This is Item number 4-9</td>
                        <td>This is Item number 5-9</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>10</td>
                        <td>This is Item number 1-10</td>
                        <td>This is Item number 2-10</td>
                        <td>This is Item number 3-10</td>
                        <td>This is Item number 4-10</td>
                        <td>This is Item number 5-10</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>11</td>
                        <td>This is Item number 1-11</td>
                        <td>This is Item number 2-11</td>
                        <td>This is Item number 3-11</td>
                        <td>This is Item number 4-11</td>
                        <td>This is Item number 5-11</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>12</td>
                        <td>This is Item number 1-12</td>
                        <td>This is Item number 2-12</td>
                        <td>This is Item number 3-12</td>
                        <td>This is Item number 4-12</td>
                        <td>This is Item number 5-12</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>13</td>
                        <td>This is Item number 1-13</td>
                        <td>This is Item number 2-13</td>
                        <td>This is Item number 3-13</td>
                        <td>This is Item number 4-13</td>
                        <td>This is Item number 5-13</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>14</td>
                        <td>This is Item number 1-14</td>
                        <td>This is Item number 2-14</td>
                        <td>This is Item number 3-14</td>
                        <td>This is Item number 4-14</td>
                        <td>This is Item number 5-14</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>15</td>
                        <td>This is Item number 1-15</td>
                        <td>This is Item number 2-15</td>
                        <td>This is Item number 3-15</td>
                        <td>This is Item number 4-15</td>
                        <td>This is Item number 5-15</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>16</td>
                        <td>This is Item number 1-16</td>
                        <td>This is Item number 2-16</td>
                        <td>This is Item number 3-16</td>
                        <td>This is Item number 4-16</td>
                        <td>This is Item number 5-16</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>17</td>
                        <td>This is Item number 1-17</td>
                        <td>This is Item number 2-17</td>
                        <td>This is Item number 3-17</td>
                        <td>This is Item number 4-17</td>
                        <td>This is Item number 5-17</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>18</td>
                        <td>This is Item number 1-18</td>
                        <td>This is Item number 2-18</td>
                        <td>This is Item number 3-18</td>
                        <td>This is Item number 4-18</td>
                        <td>This is Item number 5-18</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>19</td>
                        <td>This is Item number 1-19</td>
                        <td>This is Item number 2-19</td>
                        <td>This is Item number 3-19</td>
                        <td>This is Item number 4-19</td>
                        <td>This is Item number 5-19</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>20</td>
                        <td>This is Item number 1-20</td>
                        <td>This is Item number 2-20</td>
                        <td>This is Item number 3-20</td>
                        <td>This is Item number 4-20</td>
                        <td>This is Item number 5-20</td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination">
                <label class="disabled" for="table_radio_-1">&laquo; Previous</label>
                <label class="active" for="table_radio_0" id="table_pager_0">1</label>
                <label for="table_radio_1" id="table_pager_1">2</label>
                <label for="table_radio_2" id="table_pager_2">3</label>
                <label for="table_radio_3" id="table_pager_3">4</label>
                <label for="table_radio_4" id="table_pager_4">5</label>
                <label for="table_radio_1">Next &raquo;</label>
            </div>
            <input class="table-radio" type="radio" name="table_radio" id="table_radio_1" />
            <div class="table-display">Showing 21 to 40
                of 95 items
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>FIRST HEADER</th>
                        <th>SECOND HEADER</th>
                        <th>THIRD HEADER</th>
                        <th>FOURTH HEADER</th>
                        <th>FIFTH HEADER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>21</td>
                        <td>This is Item number 1-21</td>
                        <td>This is Item number 2-21</td>
                        <td>This is Item number 3-21</td>
                        <td>This is Item number 4-21</td>
                        <td>This is Item number 5-21</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>22</td>
                        <td>This is Item number 1-22</td>
                        <td>This is Item number 2-22</td>
                        <td>This is Item number 3-22</td>
                        <td>This is Item number 4-22</td>
                        <td>This is Item number 5-22</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>23</td>
                        <td>This is Item number 1-23</td>
                        <td>This is Item number 2-23</td>
                        <td>This is Item number 3-23</td>
                        <td>This is Item number 4-23</td>
                        <td>This is Item number 5-23</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>24</td>
                        <td>This is Item number 1-24</td>
                        <td>This is Item number 2-24</td>
                        <td>This is Item number 3-24</td>
                        <td>This is Item number 4-24</td>
                        <td>This is Item number 5-24</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>25</td>
                        <td>This is Item number 1-25</td>
                        <td>This is Item number 2-25</td>
                        <td>This is Item number 3-25</td>
                        <td>This is Item number 4-25</td>
                        <td>This is Item number 5-25</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>26</td>
                        <td>This is Item number 1-26</td>
                        <td>This is Item number 2-26</td>
                        <td>This is Item number 3-26</td>
                        <td>This is Item number 4-26</td>
                        <td>This is Item number 5-26</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>27</td>
                        <td>This is Item number 1-27</td>
                        <td>This is Item number 2-27</td>
                        <td>This is Item number 3-27</td>
                        <td>This is Item number 4-27</td>
                        <td>This is Item number 5-27</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>28</td>
                        <td>This is Item number 1-28</td>
                        <td>This is Item number 2-28</td>
                        <td>This is Item number 3-28</td>
                        <td>This is Item number 4-28</td>
                        <td>This is Item number 5-28</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>29</td>
                        <td>This is Item number 1-29</td>
                        <td>This is Item number 2-29</td>
                        <td>This is Item number 3-29</td>
                        <td>This is Item number 4-29</td>
                        <td>This is Item number 5-29</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>30</td>
                        <td>This is Item number 1-30</td>
                        <td>This is Item number 2-30</td>
                        <td>This is Item number 3-30</td>
                        <td>This is Item number 4-30</td>
                        <td>This is Item number 5-30</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>31</td>
                        <td>This is Item number 1-31</td>
                        <td>This is Item number 2-31</td>
                        <td>This is Item number 3-31</td>
                        <td>This is Item number 4-31</td>
                        <td>This is Item number 5-31</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>32</td>
                        <td>This is Item number 1-32</td>
                        <td>This is Item number 2-32</td>
                        <td>This is Item number 3-32</td>
                        <td>This is Item number 4-32</td>
                        <td>This is Item number 5-32</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>33</td>
                        <td>This is Item number 1-33</td>
                        <td>This is Item number 2-33</td>
                        <td>This is Item number 3-33</td>
                        <td>This is Item number 4-33</td>
                        <td>This is Item number 5-33</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>34</td>
                        <td>This is Item number 1-34</td>
                        <td>This is Item number 2-34</td>
                        <td>This is Item number 3-34</td>
                        <td>This is Item number 4-34</td>
                        <td>This is Item number 5-34</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>35</td>
                        <td>This is Item number 1-35</td>
                        <td>This is Item number 2-35</td>
                        <td>This is Item number 3-35</td>
                        <td>This is Item number 4-35</td>
                        <td>This is Item number 5-35</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>36</td>
                        <td>This is Item number 1-36</td>
                        <td>This is Item number 2-36</td>
                        <td>This is Item number 3-36</td>
                        <td>This is Item number 4-36</td>
                        <td>This is Item number 5-36</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>37</td>
                        <td>This is Item number 1-37</td>
                        <td>This is Item number 2-37</td>
                        <td>This is Item number 3-37</td>
                        <td>This is Item number 4-37</td>
                        <td>This is Item number 5-37</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>38</td>
                        <td>This is Item number 1-38</td>
                        <td>This is Item number 2-38</td>
                        <td>This is Item number 3-38</td>
                        <td>This is Item number 4-38</td>
                        <td>This is Item number 5-38</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>39</td>
                        <td>This is Item number 1-39</td>
                        <td>This is Item number 2-39</td>
                        <td>This is Item number 3-39</td>
                        <td>This is Item number 4-39</td>
                        <td>This is Item number 5-39</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>40</td>
                        <td>This is Item number 1-40</td>
                        <td>This is Item number 2-40</td>
                        <td>This is Item number 3-40</td>
                        <td>This is Item number 4-40</td>
                        <td>This is Item number 5-40</td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination">
                <label for="table_radio_0">&laquo; Previous</label>
                <label for="table_radio_0" id="table_pager_0">1</label>
                <label class="active" for="table_radio_1" id="table_pager_1">2</label>
                <label for="table_radio_2" id="table_pager_2">3</label>
                <label for="table_radio_3" id="table_pager_3">4</label>
                <label for="table_radio_4" id="table_pager_4">5</label>
                <label for="table_radio_2">Next &raquo;</label>
            </div>
        </div>
    </div>
</body>

</html>