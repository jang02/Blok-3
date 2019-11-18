/**
 * Created by Jan on 28 Oct 2019
 * No part of this publication may be reproduced, distributed, or transmitted in any form or by any means.
 * Copyright © EpicGodLight
 */

times_in_table = 10;

function tables(totaltables){
    for(let j = 1; j <= totaltables; j++){
        for(let i = 1; i <= times_in_table; i++){
            document.write(j + "x" + i + " = " + (j * i) + "<br/>");
        }
        document.write("<br/>")
    }
}

tables(3);